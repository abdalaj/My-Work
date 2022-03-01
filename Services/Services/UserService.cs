using Entites.Models;
using Interfaces.Helper;
using Interfaces.Interfaces;
using Interfaces.ViewModels.UserVM;
using Microsoft.AspNetCore.Identity;
using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Configuration;
using Microsoft.IdentityModel.Tokens;
using Services.Base;
using Services.Model;
using System;
using System.Collections.Generic;
using System.IdentityModel.Tokens.Jwt;
using System.Linq;
using System.Security.Claims;
using System.Text;
using System.Threading.Tasks;

namespace Services.Services
{
    public class UserService : BaseService, IUser
    {
        private UserManager<Users> _userManager;
        private ICoreBase _repoCore;
        private IConfiguration _configuration;
        private AppDbContext _context;
        public UserService(UserManager<Users> userManager,
            ICoreBase repoCore,
            IConfiguration configuration,
            AppDbContext context)
        {
            _userManager = userManager;
            _repoCore = repoCore;
            _configuration = configuration;
            _context = context;
        }

        public async Task<Users> SaveUser(RegisterViewModel model)
        {
            if (model.Id != null)
            {
                var user = await _userManager.FindByIdAsync(model.Id);
                var user_name = String.Concat(model.Name.Where(c => !Char.IsWhiteSpace(c))) + _repoCore.GenerateRandomCodeAsNumber();

                if (model.Images == null)
                {
                    model.Images = new List<string> { user.Image };
                }

                if (model.Phone != null) // if phone not null it's mean it's update profile
                {
                    user.Name = model.Name;
                    user.PhoneNumber = model.Phone;

                    foreach (var item in model.Images)
                    {
                        user.Image = item;
                    }
                }
                else // else it's complete data after verfiy confirm code 
                {
                    var token = await _userManager.GeneratePasswordResetTokenAsync(user);

                    var reset_password = await _userManager.ResetPasswordAsync(user, token, model.Password);

                    if (!reset_password.Succeeded)
                    {
                        return null;
                    }

                    user.Name = model.Name;
                    user.UserName = user_name;
                    user.NormalizedUserName = user_name.ToUpper();

                    foreach (var item in model.Images)
                    {
                        user.Image = item;
                    }
                }

                await _repoCore.SaveAll();
                return user;
            }
            else
            {
                
                var user = new Users
                {
                    Name = "default user",
                    PhoneNumber = model.Phone,
                    Country_code = model.Country_code,
                    Image = string.Empty
                };

                user.UserName = String.Concat(user.Name.Where(c => !Char.IsWhiteSpace(c))) + _repoCore.GenerateRandomCodeAsNumber();

                var result = await _userManager.CreateAsync(user, "User@8000");

                if (result.Succeeded)
                {
                    await _userManager.AddToRoleAsync(user, model.Role);
                    return user;
                }

                return null;
            }
        }

        public async Task<bool> SaveConfirmCode(SaveCodeViewModel model)
        { 
            if (!string.IsNullOrEmpty(model.Phone))
            {
                if (await IsPhoneExistBefore(model.Phone))
                {
                    return false;
                }

                var confirm_code = new ConfirmCode
                {
                    Phone = model.Phone,
                    Code = model.Generated_code,
                    Country_code = model.Country_code
                };

                _repoCore.Add(confirm_code);
                await _repoCore.SaveAll();

                return true;
            }

            return false;
        } 

        public string GetConfirmCodeByPhone(string phone)
        {
            var confirm_code = _context.ConfirmCode.FirstOrDefault(c => c.Phone == phone).Code;

            return confirm_code;
        }

        public JwtSecurityToken GenerateToken(IList<string> usersRole, Users user)
        {
            var authClaims = new List<Claim>
            {
                new Claim(ClaimTypes.Name, user.UserName),
                new Claim(ClaimTypes.NameIdentifier, user.Id),
                new Claim(JwtRegisteredClaimNames.Jti, Guid.NewGuid().ToString()),
            };

            foreach (var userRole in usersRole)
            {
                authClaims.Add(new Claim(ClaimTypes.Role, userRole));
            }

            var authSigningKey = new SymmetricSecurityKey(Encoding.UTF8.GetBytes(_configuration["JWT:SecretKey"]));

            var newToken = new JwtSecurityToken(
                issuer: _configuration["JWT:ValidIssuer"],
                audience: _configuration["JWT:ValidAudience"],
                expires: DateTime.Now.AddYears(1),
                claims: authClaims,
                signingCredentials: new SigningCredentials(authSigningKey, SecurityAlgorithms.HmacSha256));

            return newToken;

        }

        public async Task<Users> GetUserByPhoneNumber(string phone, string coutryCode)
        {
            var user = await _context.Users
                .FirstOrDefaultAsync(u => u.PhoneNumber == phone 
                    && u.Country_code == coutryCode);

            return user;
        }

        public async Task<ConfirmCode> GetCofirmCodeByPhone(string phone)
        {
            var confirmCode = await _context.ConfirmCode.FirstOrDefaultAsync(c => c.Phone == phone);

            return confirmCode;
        }

        public async Task<LoginReturnViewModel> Login(LoginViewModel model)
        {
            var user = new Users();

            if (!string.IsNullOrEmpty(model.Name))
            {
                user = _context.Users.FirstOrDefault(u => u.Name == model.Name);
            }
            else
            {
                user = _context.Users.FirstOrDefault(u => u.PhoneNumber == model.Phone);
            }

            if (user != null && await _userManager.CheckPasswordAsync(user, model.Password))
            {
                var roles = await _userManager.GetRolesAsync(user);

                GenerateToken(roles, user);

                return new LoginReturnViewModel
                {
                    Token = GenerateToken(roles, user),
                    Roles = roles
                };
            }

            return null;
        }

        public async Task<bool> IsPhoneExistBefore(string phone)
        {
            var isPhoneInDb = await _context.ConfirmCode.AnyAsync(c => c.Phone == phone);

            return isPhoneInDb;
        }

        public bool IsConfirmCodeIsRight(string confirm_code, string phone)
        {
            var confirm_code_by_phone = _context.ConfirmCode
                .FirstOrDefault(c => c.Phone == phone).Code;

            if (confirm_code_by_phone == confirm_code)
            {
                return true;
            }

            return false;
        }
    }
}
