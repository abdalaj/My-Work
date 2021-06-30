using Entites.Models;
using Interfaces.Interfaces;
using Interfaces.ViewModels.UserVM;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Identity;
using Microsoft.AspNetCore.Mvc;
using Services.Model;
using System;
using System.Collections.Generic;
using System.IdentityModel.Tokens.Jwt;
using System.Linq;
using System.Security.Claims;
using System.Threading.Tasks;

namespace App.Api
{
    [Route("api/[controller]")]
    [ApiController]
    public class UsersController : ControllerBase
    {
        private IUser _repo;
        private ICoreBase _repoCore;
        private ISms _repoSms;
        private RoleManager<IdentityRole> _roleManager;
        private UserManager<Users> _userManager;
        private AppDbContext _context;
        public UsersController(IUser repo,
            ICoreBase repoCore,
            ISms repoSms,
            RoleManager<IdentityRole> roleManager,
            UserManager<Users> userManager,
            AppDbContext context)
        {
            _repo = repo;
            _repoCore = repoCore;
            _roleManager = roleManager;
            _userManager = userManager;
            _repoSms = repoSms;

            _context = context;
        }

        [HttpPost("sendConfirmCode")]
        public async Task<IActionResult> SendConfirmCode(SendConfirmCodeViewModel model)
        {
            try
            {
                if (await _repo.IsPhoneExistInConfirmCode(model.Phone))
                {
                    var confirmCode = await _repo.GetCofirmCodeByPhone(model.Phone);

                    confirmCode.Code = _repoCore.GenerateRandomCodeAsNumber();

                    await _repoCore.SaveAll();
                }
                else
                {
                    var code = _repoCore.GenerateRandomCodeAsNumber();
                    var phone = model.Country_code + model.Phone;
                    //await _repoSms.SendMessage(phone, code);

                    await _repo.SaveCode(new SaveCodeViewModel
                    {
                        Phone = model.Phone,
                        Code = code,
                        Country_code = model.Country_code
                    });
                }

                
                return Ok(new { messageSuccess = 1 });
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 2 }); //failed send code
            }
        }

        [HttpPost("verifyCodeForRegister")]
        public async Task<IActionResult> VerifyCodeForRegister(VerifyCodeViewModel model)
        {
            try
            {
                var code = _repo.GetCodeByPhone(model.Phone);

                if (model.Code != code)
                {
                    return BadRequest(new { messageError = 3 }); //code is not correct

                }

                var user =  await _repo.SaveUser(new RegisterViewModel
                {
                    Phone = model.Phone,
                    Country_code = model.Country_code
                });

                if (_context.Roles.Count() == 0)
                {
                    var roles = new List<IdentityRole>
                    {
                        new IdentityRole { Name = "User", NormalizedName = "USER"},
                        new IdentityRole { Name = "Admin", NormalizedName = "ADMIN"},
                        new IdentityRole { Name = "SuberAdmin", NormalizedName = "SUBERADMIN"}
                    };

                    foreach (var item in roles)
                    {
                        await _roleManager.CreateAsync(item);
                    }
                }

                var role = new List<string> { "User" };

                var token = _repo.GenerateToken(role, user);

                return Ok(new { messageSuccess = 1 ,
                    token = new JwtSecurityTokenHandler().WriteToken(token)});

            }
            catch
            {
                return BadRequest(new { messageError = 4 }); //error while verifing
            }
        }

        [HttpPost("updateInfo")]
        public async Task<IActionResult> UpdateInfo(RegisterViewModel model)
        {
            try
            {
                if (string.IsNullOrEmpty(model.Name) || string.IsNullOrWhiteSpace(model.Name))
                {
                    return BadRequest(new { messageError = 7 }); // name must be fill
                }

                if (string.IsNullOrEmpty(model.Password) || string.IsNullOrWhiteSpace(model.Password))
                {
                    return BadRequest(new { messageError = 8 }); // password must be fill
                }

                if (model.Password != model.Password_confirm)
                {
                    return BadRequest(new { messageError = 9 }); // password not match
                }

                model.Id = User.FindFirst(ClaimTypes.NameIdentifier).Value;
                var createUser = await _repo.SaveUser(model);

                if (createUser != null)
                {
                    return Ok(new { messageSuccess = 1 });
                }

                return BadRequest(new { messageError = 5 }); //failed update info or password week
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 6 }); //failed while updateing info
            }
        }

        [HttpPost("verifyCodeForgetPassword")]
        public IActionResult VerifyCodeForgetPassword(VerifyCodeViewModel model)
        {
            try
            {
                var code = _repo.GetCodeByPhone(model.Phone);

                if (model.Code != code)
                {
                    return BadRequest(new { messageError = 3 }); //code is not correct

                }

                return Ok(new { messageSuccess = 1 });

            }
            catch
            {
                return BadRequest(new { messageError = 4 }); //error while verifing
            }
        }

        [HttpPost("resetPassword")]
        public async Task<IActionResult> ResetPassword(ResetPasswordViewModel model)
        {
            try
            {
                var user = await _repo.GetUserByPhoneNumber(model.Phone, model.Country_code);   

                if (user == null)
                {
                    return BadRequest(new { messageError = 10}); // phone is wrong or you not registerd
                }

                if (model.New_Password != model.Password_confirm)
                {
                    return BadRequest(new { messageError = 9 }); // password not be match
                }

                var token = await _userManager.GeneratePasswordResetTokenAsync(user);
                var result = await _userManager.ResetPasswordAsync(user, token, model.New_Password);

                if (!result.Succeeded)
                {
                    return BadRequest(new { messageError = 11 }); // week password
                }

                return Ok(new { messageSuccess = 1 });
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 12 }); // error while reset password
            }
        }

        [HttpPost("changePasword")]
        public async Task<IActionResult> ChangePassword(ChangePasswordViewModel model)
        {
            try
            {
                if (string.IsNullOrEmpty(model.Old_password) || string.IsNullOrWhiteSpace(model.Old_password))
                {
                    return BadRequest(new { messageError = 8 }); // password must be fill
                }

                if (string.IsNullOrEmpty(model.New_password) || string.IsNullOrWhiteSpace(model.New_password))
                {
                    return BadRequest(new { messageError = 8 }); // password must be fill
                }

                if (model.New_password != model.Password_confirm)
                {
                    return BadRequest(new { messageError = 9 }); // password not match
                }

                var user = await _userManager.FindByIdAsync(User.FindFirst(ClaimTypes.NameIdentifier).Value);
                var checkPassword = await _userManager.CheckPasswordAsync(user, model.Old_password);

                if (!checkPassword)
                {
                    return BadRequest(new { messageError = 13 }); // password is wrong
                }

                var token = await _userManager.GeneratePasswordResetTokenAsync(user);
                var result = await _userManager.ResetPasswordAsync(user, token, model.New_password);

                if (!result.Succeeded)
                {
                    return BadRequest(new { messageError = 11 }); // week password
                }

                var userRoles = await _userManager.GetRolesAsync(user);

                JwtSecurityToken newToken = _repo.GenerateToken(userRoles.ToList(), user);

                return Ok(new { messageSuccess = 1 });
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 14 }); // error while changing password
            }
        }

        [HttpPost("login")]
        public async Task<IActionResult> Login(LoginViewModel model)
        {
            try
            {
                var loginResult = await _repo.Login(model);

                if (loginResult == null)
                {
                    return BadRequest(new { messageError = 15 }); // phone or password is wrong
                }

                return Ok(new { messageSuccess = 1, token = new JwtSecurityTokenHandler().WriteToken(loginResult.Token)});
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 16 }); // error while login process
            }
        }
    }
}
