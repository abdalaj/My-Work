using Interfaces.Base;
using Interfaces.ViewModels.RatingVM;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.Interfaces
{
    public interface IRating : IService
    {
        Task<bool> CheckIfUserRatedStadium(string user_id, int stadium_id);
        Task<bool> SaveRating(SaveRatingViewModel model);
    }
}
