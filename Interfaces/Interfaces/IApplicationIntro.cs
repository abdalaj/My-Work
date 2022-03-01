using Entites.Models;
using Interfaces.Base;
using Interfaces.Helper;
using Interfaces.ViewModels.IntroVM;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.Interfaces
{
    public interface IApplicationIntro : IService
    {
        Task<List<GetApplicationIntroViewModel>> GetApplicationIntros(UserParam param, string root);
        Task<PagedList<GetApplicationIntroViewModel>> GetIntroWithPagination(UserParam param);
        Task<ApplicationIntro> GetIntro(int id);
        Task<SaveApplicationIntroViewModel> GetUpdatedIntroById(int id);
        Task<string> SaveIntro(SaveApplicationIntroViewModel model, string root);
    }
}
