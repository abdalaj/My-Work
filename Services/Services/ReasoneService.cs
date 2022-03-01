using Entites.Models;
using Interfaces.Helper;
using Interfaces.Interfaces;
using Interfaces.ViewModels.ReasoneVM;
using Microsoft.EntityFrameworkCore;
using Services.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Services.Services
{
    public class ReasoneService : Base.BaseService, IReasone
    {
        private ICoreBase _repoCore;
        private AppDbContext _context;
        public ReasoneService(ICoreBase repoCore,
            AppDbContext context)
        {
            _repoCore = repoCore;
            _context = context;
        }

        public async Task<ReasonsCancel> GetReasoneCancel(int id)
        {
            var reason = await _context.ReasonsCancels.FirstOrDefaultAsync(r => r.Id == id);

            return reason;
        }

        public async Task<List<GetReasoneViewModel>> GetReasones(UserParam param)
        {
            var reasons = await _context.ReasonsCancels
                .Select(r => new GetReasoneViewModel { 
                    Id = r.Id,
                    Reasone = param.Lang == "en"? r.Reason_en : r.Reason_ar
                }).ToListAsync();

            return reasons;
        }

        public async Task<PagedList<GetReasoneViewModel>> GetReasonsWithPagination(UserParam param)
        {
            var reasons = _context.ReasonsCancels
                .Select(x => new GetReasoneViewModel { 
                    Id = x.Id,
                    Reasone = x.Reason_en
                }).AsQueryable();

            if (!string.IsNullOrEmpty(param.Key))
            {
                reasons = reasons.Where(x => x.Reasone.Contains(param.Key));
            }

            return await PagedList<GetReasoneViewModel>
                .CreateAsync(reasons, param.PageNumber, param.PageSize);
        }

        public async Task<SaveReasoneViewModel> GetUpdatedReasoneById(int id)
        {
            var reasone = await GetReasoneCancel(id);

            var model = new SaveReasoneViewModel
            {
                Id = reasone.Id,
                Reasone_en = reasone.Reason_en,
                Reasone_ar = reasone.Reason_ar
            };

            return model;
        }

        public async Task<bool> SaveReasone(SaveReasoneViewModel model)
        {
            if (model.Id != 0)
            {
                var reason = await GetReasoneCancel(model.Id);

                if (reason == null)
                {
                    return false;
                }

                reason.Reason_en = model.Reasone_en;
                reason.Reason_ar = model.Reasone_ar;

            }
            else {

                var reasone = new ReasonsCancel
                {
                    Reason_en = model.Reasone_en,
                    Reason_ar = model.Reasone_ar
                };

                _repoCore.Add(reasone);
            }

            await _repoCore.SaveAll();
            return true;
        }
    }
}
