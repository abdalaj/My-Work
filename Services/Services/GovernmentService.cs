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
    public class GovernmentService : BaseService , IGovernment
    {
        private AppDbContext _context;
        private ICoreBase _repoCore;
        public GovernmentService(AppDbContext context,
            ICoreBase repoCore)
        {
            _context = context;
            _repoCore = repoCore;
        }

        public async Task<SaveGovernmentViewModel> GetUpdatedGovernmentById(int id)
        {
            var government = await GetGovernment(id);

            var model = new SaveGovernmentViewModel
            {

                Id = government.Id,
                Name_ar = government.Name_ar,
                Name_en = government.Name_en
            };

            return model;
        }

        public async Task<List<GetGovernmentNameDropDownListViewModel>> GovernmentsNameDropDownList(UserParam param)
        {
            var governments = await _context.Governments
                .Select(g => new GetGovernmentNameDropDownListViewModel
                {
                    Id = g.Id,
                    Name = param.Lang == "en" ? g.Name_en : g.Name_ar
                }).ToListAsync();

            return governments;
        }

        public async Task<Government> GetGovernment(int id)
        {
            var government = await _context.Governments.FindAsync(id);

            return government;
        }

        public async Task<List<GetGovenmentViewModel>> GetGovernments()
        {
            var governments = await _context.Governments
                .Select(g => new GetGovenmentViewModel
                {
                    Id = g.Id,
                    Name = g.Name_en
                }).ToListAsync();

            return governments;
        }

        public async Task<bool> SaveGovernment(SaveGovernmentViewModel model)
        {
            if (model.Id != 0)
            {
                var government = await GetGovernment(model.Id);

                if (government == null)
                {
                    return false;
                }

                government.Name_ar = model.Name_ar;
                government.Name_en = model.Name_en;

                await _repoCore.SaveAll();

                return true;
            }
            else
            {

                var government = new Government
                {
                    Name_en = model.Name_en,
                    Name_ar = model.Name_ar
                };

                _repoCore.Add(government);

                await _repoCore.SaveAll();

                return true;
            }
        }

        public async Task<PagedList<GetGovenmentViewModel>> GetGovernmentsWithPagination(UserParam param)
        {
            var govenments = _context.Governments
                .Select(g => new GetGovenmentViewModel
                {
                    Id = g.Id,
                    Name = g.Name_en
                }).AsQueryable();

            if (!string.IsNullOrEmpty(param.Key))
            {
                govenments = govenments.Where(g => g.Name.Contains(param.Key));
            }

            return await PagedList<GetGovenmentViewModel>
                .CreateAsync(govenments, param.PageNumber, param.PageSize);
        }
    }
}
