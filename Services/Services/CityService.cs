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
    public class CityService : BaseService , ICity
    {
        private AppDbContext _context;
        private ICoreBase _repoCore;
        private IGovernment _repoGovernment;
        public CityService(AppDbContext context,
            ICoreBase repoCore,
            IGovernment repoGovernment)
        {
            _context = context;
            _repoCore = repoCore;
            _repoGovernment = repoGovernment;
        }

        public async Task<bool> SaveCity(SaveCityViewModel model)
        {
            if (model.Id != 0)
            {
                var city = await GetCity(model.Id);

                if (city == null)
                {
                    return false;
                }

                city.Name_ar = model.Name_ar;
                city.Name_en = model.Name_en;
                city.Government_id = model.Government_id.Value;

                await _repoCore.SaveAll();

                return true;
            }
            else
            {

                var city = new City
                {
                    Name_en = model.Name_en,
                    Name_ar = model.Name_ar,
                    Government_id = model.Government_id.Value
                };

                _repoCore.Add(city);

                await _repoCore.SaveAll();

                return true;
            }
        }

        public async Task<SaveCityViewModel> GetUpdatedCityById(int id)
        {
            var city = await GetCity(id);

            var model = new SaveCityViewModel
            {
                Id = city.Id,
                Name_ar = city.Name_ar,
                Name_en = city.Name_en,
                Government_id = city.Government_id,
                Government_drop_down_list = await _repoGovernment.GetGovernments()
            };

            return model;
        }

        public async Task<List<GetCitesNameDropDownListViewModel>> CitesNameDropDownList(int governmentId, UserParam param)
        {
            var cities = await _context.City
                .Where(c => c.Government_id == governmentId)
                .Select(c => new GetCitesNameDropDownListViewModel
                {
                    Id = c.Id,
                    Name = param.Lang == "en" ? c.Name_en : c.Name_ar
                }).ToListAsync();

            return cities;
        }

        public async Task<PagedList<GetCityViewModel>> GetCitiesWithPagination(UserParam param)
        {
            var cities = _context.City
                .Include(x => x.Government)
                .Select(c => new GetCityViewModel
                {
                    Id = c.Id,
                    Name = c.Name_en,
                    Governmant_name = c.Government.Name_en
                }).AsQueryable();

            if (!string.IsNullOrEmpty(param.Key))
            {
                cities = cities.Where(c => c.Name.Contains(param.Key)
                    || c.Governmant_name.Contains(param.Key));
            }

            return await PagedList<GetCityViewModel>
                .CreateAsync(cities, param.PageNumber, param.PageSize);
        }

        public async Task<City> GetCity(int id)
        {
            var city = await _context.City.FindAsync(id);

            return city;
        }

        public async Task<bool> CheckCityExistBefore(string name)
        {
            var is_city_exist_in_db = await _context.City.
                AnyAsync(c => c.Name_en == name || c.Name_ar == name);

            return is_city_exist_in_db;
        }
    }
}
