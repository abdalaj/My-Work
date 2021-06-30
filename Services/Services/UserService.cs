using Entites.Models;
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
                var userName = model.Name + _repoCore.GenerateRandomCodeAsNumber();

                var user = await _userManager.FindByIdAsync(model.Id);
                var token = await _userManager.GeneratePasswordResetTokenAsync(user);

                var resetPassword =  await _userManager.ResetPasswordAsync(user, token, model.Password);

                if (!resetPassword.Succeeded)
                {
                    return null;
                }

                user.Name = model.Name;
                user.UserName = userName;
                user.NormalizedUserName = userName.ToUpper();

                await _repoCore.SaveAll();
                return user;
            }
            else
            {
                
                var user = new Users
                {
                    Name = "default user",
                    UserName = "defaultUser_8000",
                    PhoneNumber = model.Phone,
                    Country_code = model.Country_code
                };

                var result = await _userManager.CreateAsync(user, "User@8000");

                if (result.Succeeded)
                {
                    return user;
                }

                return null;
            }
        }

        public async Task<bool> SaveCode(SaveCodeViewModel model)
        {
            if (!string.IsNullOrEmpty(model.Phone))
            {
                var code = new ConfirmCode
                {
                    Phone = model.Phone,
                    Code = model.Code,
                    Country_code = model.Country_code
                };

                _repoCore.Add(code);
                await _repoCore.SaveAll();

                return true;
            }

            return false;
        }

        public string GetCodeByPhone(string phone)
        {
            var code = _context.ConfirmCode.FirstOrDefault(c => c.Phone == phone).Code;

            return code;
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
                issuer: "",
                audience: "",
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

        public async Task<bool> IsPhoneExistInConfirmCode(string phone)
        {
            var isPhoneExist = await _context.ConfirmCode.AnyAsync(c => c.Phone == phone);

            return isPhoneExist;
        }

        public async Task<LoginReturnViewModel> Login(LoginViewModel model)
        {
            var user = _context.Users.FirstOrDefault(u => u.PhoneNumber == model.Phone);

            if (user != null && await _userManager.CheckPasswordAsync(user, model.Password))
            {
                var roles = await _userManager.GetRolesAsync(user);

                GenerateToken(roles, user);

                return new LoginReturnViewModel
                {
                    Token = GenerateToken(roles, user)
                };
            }

            return null;
        }
    }
}
