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
    public interface IStadium : IService
    {
        Task<decimal> CalculateStadiumRate(int id);
        Task<GetStadiumDetailsForUpdateViewModel> GetStadiumDetailsForUpdateById(int id);
        Task<GetStadiumDetailsViewModel> GetStadiumDetailsById(int id, UserParam param);
        Task<bool> IsStadiumHasTheseFeatures(List<int> ids, int stadium_id);
        Task<bool> IsYouStadiumsOwner(string id, int stadium_id);
        Task<bool> IsStadiumExist(int id);
        Task<List<GetAdminsStadiumViewModel>> GetAdminsStadiumById(string id, UserParam param, string root);
        Task<Stadium> GetStadium(int id);
        Task<List<string>> GetStadiumTimesOfPlay(int id, UserParam param);
        Task<List<GetStadiumsForAdminViewModel>> GetStadiumsForAdminById(string id, UserParam param);
        Task<List<StadiumImage>> GetImagesForStadium(int id);
        Task<List<FeaturesOfStadium>> GetFuturesForStadium(int id);
        Task<SaveStadiumResultViewModel> SaveStadium(SaveStadiumViewModel model);
        Task<List<string>> GetStadiumImagesById(int id);
        Task<List<int>> GetStadiumFeaturesById(int id);
        Task<bool> SaveStadiumImages(int id, List<string> model, bool isUpdated, string root);
        Task<bool> SaveStadiumFutures(int id, List<int> model, bool isUpdated);
        Task<List<GetStadiumsAndFeaturesViewModel>> GetUpdateStadiumsAndFeaturesById(int id);
    }
}
