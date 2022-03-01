using Entites.Models;
using Interfaces.Helper;
using Interfaces.Interfaces;
using Interfaces.ViewModels.PushNotificationVM;
using Interfaces.ViewModels.UserVM;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Identity;
using Microsoft.AspNetCore.Mvc;
using Services.Model;
using System;
using System.Collections.Generic;
using System.IdentityModel.Tokens.Jwt;
using System.IO;
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
        private IWebHostEnvironment _webHost;
        public UsersController(IUser repo,
            ICoreBase repoCore,
            ISms repoSms,
            RoleManager<IdentityRole> roleManager,
            UserManager<Users> userManager,
            AppDbContext context,
            IWebHostEnvironment webHost)
        {
            _repo = repo;
            _repoCore = repoCore;
            _roleManager = roleManager;
            _userManager = userManager;
            _repoSms = repoSms;
            _webHost = webHost;
            _context = context;
        }

        [HttpPost("send-confirm-code")]
        public async Task<IActionResult> SendConfirmCode(SendConfirmCodeViewModel model)
        {
            try
            {
                if (await _repo.IsPhoneExistBefore(model.Phone))
                {
                    var confirmCode = await _repo.GetCofirmCodeByPhone(model.Phone);

                    confirmCode.Code = _repoCore.GenerateRandomCodeAsNumber();

                    await _repoCore.SaveAll();
                }
                else
                {
                    var generated_code = _repoCore.GenerateRandomCodeAsNumber();
                    var phone = model.Country_code + model.Phone;
                    //await _repoSms.SendMessage(phone, generated_code);

                    await _repo.SaveConfirmCode(new SaveCodeViewModel
                    {
                        Phone = model.Phone,
                        Generated_code = generated_code,
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

        [HttpPost("verify-code-for-register-user")]
        public async Task<IActionResult> VerifyCodeForRegisterUser(VerifyCodeViewModel model)
        {
            try
            {
                if (!_repo.IsConfirmCodeIsRight(model.Generated_code, model.Phone))
                {
                    return BadRequest(new { messageError = 55 }); // code not identity
                }

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

                var user = await _repo.SaveUser(new RegisterViewModel
                {
                    Phone = model.Phone,
                    Country_code = model.Country_code,
                    Role = "User"
                });

                var role = new List<string> { "User" };

                var token = _repo.GenerateToken(role, user);

                var notify = new PushNotification();
                var obj = new PushNotificationAttributeVM();

                obj.Body = "code verified successed";

                //string[] devicesIds = { user.DeviceToken };
                //obj.DeviceIds = devicesIds;
                //obj.Case = "3";
                obj.Title = "you have a message";
                notify.Push(obj);

                return Ok(new { messageSuccess = 1 ,
                    token = new JwtSecurityTokenHandler().WriteToken(token)});

            }
            catch
            {
                return BadRequest(new { messageError = 4 }); //error while verifing
            }
        }

        [HttpPost("verify-code-for-register-admin")]
        public async Task<IActionResult> VerifyCodeForRegisterAdmin(VerifyCodeViewModel model)
        {
            try
            {
                if (!_repo.IsConfirmCodeIsRight(model.Generated_code, model.Phone))
                {
                    return BadRequest(new { messageError = 55 }); // code not identity
                }

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

                var user = await _repo.SaveUser(new RegisterViewModel
                {
                    Phone = model.Phone,
                    Country_code = model.Country_code,
                    Role = "Admin"
                });

                var role = new List<string> { "Admin" };

                var token = _repo.GenerateToken(role, user);

                return Ok(new
                {
                    messageSuccess = 1,
                    token = new JwtSecurityTokenHandler().WriteToken(token)
                });

            }
            catch
            {
                return BadRequest(new { messageError = 4 }); //error while verifing
            }
        }

        [Authorize]
        [HttpPut("complete-data")]
        public async Task<IActionResult> CompleteDate(RegisterViewModel model)
        {
            try
            {
                if (string.IsNullOrEmpty(model.Name))
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

                var fileName = new List<string>();
                var root = Path.Combine(_webHost.WebRootPath, "upload");

                var upload = _repoCore.SaveMultiImage(root, model.Images, out fileName);

                if (!upload)
                {
                    return BadRequest(new { messageError = 30 }); // upload failed
                }


                model.Id = User.FindFirst(ClaimTypes.NameIdentifier).Value;
                model.Images = fileName;

                var result = await _repo.SaveUser(model);

                if (result != null)
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

        [Authorize]
        [HttpPut("edit-profile")]
        public async Task<IActionResult> EditProfile(RegisterViewModel model)
        {
            try
            {
                if (string.IsNullOrEmpty(model.Name))
                {
                    return BadRequest(new { messageError = 7 }); // name must be fill
                }

                if (string.IsNullOrEmpty(model.Phone))
                {
                    return BadRequest(new { messageError = 3 }); // phone must be fill
                }

                if (model.Images != null)
                {
                    var fileName = new List<string>();
                    var root = Path.Combine(_webHost.WebRootPath, "upload");

                    var upload = _repoCore.SaveMultiImage(root, model.Images, out fileName);

                    if (!upload)
                    {
                        return BadRequest(new { messageError = 30 }); // upload failed
                    }

                    model.Images = fileName;
                }

                model.Id = User.FindFirst(ClaimTypes.NameIdentifier).Value;
                var result = await _repo.SaveUser(model);

                if (result != null)
                {
                    return Ok(new { messageSuccess = 1 });
                }

                return BadRequest(new { messageError = 39 }); // failed edit profile
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 40 }); // error while editing profile
            }
        }

        [HttpPost("verify-code-forget-password")]
        public IActionResult VerifyCodeForgetPassword(VerifyCodeViewModel model)
        {
            try
            {
                var confirmed_code_saved = _repo.GetConfirmCodeByPhone(model.Phone); // to get code to compare

                if (model.Generated_code != confirmed_code_saved)
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

        [HttpPost("reset-password")]
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

        [Authorize]
        [HttpPost("change-pasword")]
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
                var check_password = await _userManager.CheckPasswordAsync(user, model.Old_password);

                if (!check_password)
                {
                    return BadRequest(new { messageError = 13 }); // password is wrong
                }

                var token = await _userManager.GeneratePasswordResetTokenAsync(user);
                var result = await _userManager.ResetPasswordAsync(user, token, model.New_password);

                if (!result.Succeeded)
                {
                    return BadRequest(new { messageError = 11 }); // week password
                }

                var user_roles = await _userManager.GetRolesAsync(user);

                JwtSecurityToken newToken = _repo.GenerateToken(user_roles.ToList(), user);

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
                if (string.IsNullOrEmpty(model.Phone))
                {
                    return BadRequest(new { messageError = 3 }); // phone must be fill
                }

                var result = await _repo.Login(model);

                if (result == null)
                {
                    return BadRequest(new { messageError = 15 }); // phone or password is wrong
                }

                return Ok(new { messageSuccess = 1,
                    token = new JwtSecurityTokenHandler().WriteToken(result.Token),
                    roles = result.Roles });
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 16 }); // error while login process
            }
        }

    }
}
