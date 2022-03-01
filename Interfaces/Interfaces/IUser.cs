using Entites.Models;
using Interfaces.Base;
using Interfaces.Helper;
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
        bool IsConfirmCodeIsRight(string confirm_code, string phone);
        Task<bool> IsPhoneExistBefore(string phone);
        Task<LoginReturnViewModel> Login(LoginViewModel model);
        JwtSecurityToken GenerateToken(IList<string> usersRole, Users user);
        Task<bool> SaveConfirmCode(SaveCodeViewModel model);
        Task<Users> SaveUser(RegisterViewModel model);
        string GetConfirmCodeByPhone(string phone);
        Task<ConfirmCode> GetCofirmCodeByPhone(string phone);
        Task<Users> GetUserByPhoneNumber(string phone, string coutryCode);
    }
}
