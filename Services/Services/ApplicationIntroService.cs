using Entites.Models;
using Interfaces.Helper;
using Interfaces.Interfaces;
using Interfaces.ViewModels.IntroVM;
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
    public class ApplicationIntroService : BaseService , IApplicationIntro
    {
        private ICoreBase _repoCore;
        private AppDbContext _context;
        public ApplicationIntroService(ICoreBase repoCore,
            AppDbContext context)
        {
            _repoCore = repoCore;
            _context = context;
        }

        public async Task<List<GetApplicationIntroViewModel>> GetApplicationIntros(UserParam param, string root)
        {
            var application_intros = await _context.ApplicationIntro
                .Select(a => new GetApplicationIntroViewModel { 
                    Id = a.Id,
                    Description = param.Lang == "en"? a.Description_en : a.Description_ar,
                    Image = root + a.Image
                }).ToListAsync();

            return application_intros;
        }

        public async Task<ApplicationIntro> GetIntro(int id)
        {
            var appliaction_intro = await _context.ApplicationIntro.FindAsync(id);

            return appliaction_intro;
        }

        public async Task<PagedList<GetApplicationIntroViewModel>> GetIntroWithPagination(UserParam param)
        {
            var appliaction_intro = _context.ApplicationIntro
                .Select(i => new GetApplicationIntroViewModel { 
                    Id = i.Id,
                    Description = i.Description_en,
                    Image = i.Image
                }).AsQueryable();

            if (!string.IsNullOrEmpty(param.Key))
            {
                appliaction_intro = appliaction_intro.Where(x => x.Description.Contains(param.Key));
            }

            return await PagedList<GetApplicationIntroViewModel>
                .CreateAsync(appliaction_intro, param.PageNumber, param.PageSize);
        }

        public async Task<SaveApplicationIntroViewModel> GetUpdatedIntroById(int id)
        {
            var appliaction_intro = await GetIntro(id);

            return new SaveApplicationIntroViewModel
            {
                Id = appliaction_intro.Id,
                Description_en = appliaction_intro.Description_en,
                Description_ar = appliaction_intro.Description_ar,
                Image = appliaction_intro.Image
            };
        }

        public async Task<string> SaveIntro(SaveApplicationIntroViewModel model, string root)
        {
            if (model.Id != 0)
            {
                var appliaction_intro = await GetIntro(model.Id);

                if (model.File == null)
                {
                    model.Image = appliaction_intro.Image;
                }
                else
                {
                    string full_path = root + "/" + appliaction_intro.Image;
                    if (System.IO.File.Exists(full_path))
                    {
                        System.IO.File.Delete(full_path);
                    }

                    string file_name;
                    _repoCore.SaveSingleImage(root, model.File, out file_name);

                    appliaction_intro.Image = file_name;
                }

                appliaction_intro.Description_en = model.Description_en;
                appliaction_intro.Description_ar = model.Description_ar;
            }
            else
            {
                if (model.File == null)
                {
                    return "Please, you have to uplaod image";
                }

                string file_name;
                _repoCore.SaveSingleImage(root, model.File, out file_name);

                var appliaction_intro = new ApplicationIntro
                {
                    Description_en = model.Description_en,
                    Description_ar = model.Description_ar,
                    Image = file_name
                };

                _repoCore.Add(appliaction_intro);
            }

            await _repoCore.SaveAll();
            return null;
        }
    }
}
