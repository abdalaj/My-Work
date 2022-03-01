using Entites.Models;
using Interfaces.Helper;
using Interfaces.Interfaces;
using Interfaces.ViewModels.StadiumVM;
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
    public class FeatureService : BaseService , IFeature
    {
        private AppDbContext _context;
        private ICoreBase _repoCore;
        public FeatureService(AppDbContext context,
            ICoreBase repoCore)
        {
            _context = context;
            _repoCore = repoCore;
        }

        public async Task<PagedList<GetFutureViewModel>> GetFutureWithPagination(UserParam param)
        {
            var futures = _context.Features
                .Select(f => new GetFutureViewModel
                {
                    Id = f.Id,
                    Name = f.Name_er
                }).AsQueryable();


            if (!string.IsNullOrEmpty(param.Key))
            {
                futures = futures.Where(f => f.Name.Contains(param.Key));
            }

            return await PagedList<GetFutureViewModel>
                .CreateAsync(futures, param.PageNumber, param.PageSize);
        }


        public async Task<SaveFutureViewModel> GetUpdatedFutrueById(int id)
        {
            var future = await GetFutrue(id);

            var model = new SaveFutureViewModel
            {
                Id = future.Id,
                Name_en = future.Name_er,
                Name_ar = future.Name_ar
            };

            return model;
        }


        public async Task<bool> SaveFuture(SaveFutureViewModel model)
        {
            if (model.Id != 0)
            {
                var future = await GetFutrue(model.Id);

                if (future == null)
                {
                    return false;
                }

                future.Name_ar = model.Name_ar;
                future.Name_er = model.Name_en;

                await _repoCore.SaveAll();

                return true;
            }
            else
            {

                var future = new Features
                {
                    Name_er = model.Name_en,
                    Name_ar = model.Name_ar
                };

                _repoCore.Add(future);

                await _repoCore.SaveAll();

                return true;
            }
        }

        public async Task<Features> GetFutrue(int id)
        {
            var future = await _context.Features.FindAsync(id);

            return future;
        }

        public async Task<List<GetFutureViewModel>> GetFutures(UserParam param)
        {
            var futures = await _context.Features
                .Select(f => new GetFutureViewModel
                {
                    Id = f.Id,
                    Name = param.Lang == "en" ? f.Name_er : f.Name_ar
                }).ToListAsync();

            return futures;
        }

        public async Task<bool> IsFeatureExist(List<int> ids)
        {
            var is_feature_in_db = false;

            foreach (var item in ids)
            {
                is_feature_in_db = await _context.Features.AnyAsync(f => f.Id == item);
            }

            return is_feature_in_db;
        }
    }
}
