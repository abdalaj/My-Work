using Entites.Models;
using Interfaces.Base;
using Interfaces.ViewModels.UserVM;
using System;
using System.Collections.Generic;
using System.IdentityModel.Tokens.Jwt;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.Interfaces
{
    public interface IUser : IService
    {
        Task<LoginReturnViewModel> Login(LoginViewModel model);
        JwtSecurityToken GenerateToken(IList<string> usersRole, Users user);
        Task<bool> SaveCode(SaveCodeViewModel model);
        Task<bool> IsPhoneExistInConfirmCode(string phone);
        Task<Users> SaveUser(RegisterViewModel model);
        string GetCodeByPhone(string phone);
        Task<ConfirmCode> GetCofirmCodeByPhone(string phone);
        Task<Users> GetUserByPhoneNumber(string phone, string coutryCode);
    }
}
