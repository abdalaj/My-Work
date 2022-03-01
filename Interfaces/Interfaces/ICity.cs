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
    public interface ICity : IService
    {
        Task<bool> CheckCityExistBefore(string name);
        Task<SaveCityViewModel> GetUpdatedCityById(int id);
        Task<PagedList<GetCityViewModel>> GetCitiesWithPagination(UserParam param);
        Task<List<GetCitesNameDropDownListViewModel>> CitesNameDropDownList(int governmentId, UserParam param);
        Task<bool> SaveCity(SaveCityViewModel model);
        Task<City> GetCity(int id);

    }
}
