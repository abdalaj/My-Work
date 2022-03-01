using Entites.Models;
using Interfaces.Base;
using Interfaces.Helper;
using Interfaces.ViewModels.StadiumVM;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.Interfaces
{
    public interface IGovernment : IService
    {
        Task<PagedList<GetGovenmentViewModel>> GetGovernmentsWithPagination(UserParam param);
        Task<List<GetGovernmentNameDropDownListViewModel>> GovernmentsNameDropDownList(UserParam param);
        Task<Government> GetGovernment(int id);
        Task<bool> SaveGovernment(SaveGovernmentViewModel model);
        Task<List<GetGovenmentViewModel>> GetGovernments();
        Task<SaveGovernmentViewModel> GetUpdatedGovernmentById(int id);

    }
}
