using Entites.Models;
using Interfaces.Base;
using Interfaces.Helper;
using Interfaces.ViewModels.ReasoneVM;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.Interfaces
{
    public interface IReasone : IService
    {
        Task<List<GetReasoneViewModel>> GetReasones(UserParam param);
        Task<PagedList<GetReasoneViewModel>> GetReasonsWithPagination(UserParam param);
        Task<SaveReasoneViewModel> GetUpdatedReasoneById(int id);
        Task<ReasonsCancel> GetReasoneCancel(int id);
        Task<bool> SaveReasone(SaveReasoneViewModel model);
    }
}
