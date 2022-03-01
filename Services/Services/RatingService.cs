using Entites.Models;
using Interfaces.Interfaces;
using Interfaces.ViewModels.RatingVM;
using Microsoft.EntityFrameworkCore;
using Services.Base;
using Services.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Services.Services
{
    public class RatingService : BaseService, IRating
    {
        private ICoreBase _repoCore;
        private AppDbContext _context;
        public RatingService(ICoreBase repoCore,
            AppDbContext context)
        {
            _repoCore = repoCore;
            _context = context;
        }

        public async Task<bool> CheckIfUserRatedStadium(string user_id, int stadium_id)
        {
            var is_user_rated_stadium = await _context.Ratings
                .AnyAsync(r => r.User_id == user_id && r.Stadium_id == stadium_id);

            return is_user_rated_stadium;
        }

        public async Task<bool> SaveRating(SaveRatingViewModel model)
        {
            var rate = new Rate
            {
                Stadium_id = model.Stadium_id,
                User_id = model.User_id,
                Rating = model.Rating
            };

            _repoCore.Add(rate);
            await _repoCore.SaveAll();

            return true;
        }
    }
}
