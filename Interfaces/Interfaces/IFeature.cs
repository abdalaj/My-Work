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
    public interface IFeature : IService
    {
        Task<List<GetFutureViewModel>> GetFutures(UserParam param);
        Task<SaveFutureViewModel> GetUpdatedFutrueById(int id);
        Task<PagedList<GetFutureViewModel>> GetFutureWithPagination(UserParam param);
        Task<Features> GetFutrue(int id);
        Task<bool> SaveFuture(SaveFutureViewModel model);
        Task<bool> IsFeatureExist(List<int> ids);
    }
}
