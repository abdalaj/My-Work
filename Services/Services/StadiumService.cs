using Entites.Models;
using Interfaces.Helper;
using Interfaces.Interfaces;
using Interfaces.ViewModels.StadiumVM;
using Microsoft.EntityFrameworkCore;
using Services.Base;
using Services.Model;
using System;
using System.Collections.Generic;
using System.Globalization;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Services.Services
{
    public class StadiumService : BaseService, IStadium
    {
        private ICoreBase _repoCore;
        private AppDbContext _context;
        public StadiumService(ICoreBase repoCore,
            AppDbContext context)
        {
            _repoCore = repoCore;
            _context = context;
        }

        public async Task<decimal> CalculateStadiumRate(int id)
        {
            var stadium_rates = await _context.Ratings
                .Where(x => x.Stadium.Id == id)
                .ToListAsync();

            var five_votes = stadium_rates.Where(v => v.Rating == 5).Count();
            var four_votes = stadium_rates.Where(v => v.Rating == 4).Count();
            var three_votes = stadium_rates.Where(v => v.Rating == 3).Count();
            var two_votes = stadium_rates.Where(v => v.Rating == 2).Count();
            var one_votes = stadium_rates.Where(v => v.Rating == 1).Count();

            var total_votes = stadium_rates.Count();

            decimal calculate_rating = (

                (5 * five_votes) +
                (4 * four_votes) +
                (3 * three_votes) +
                (2 * two_votes) +
                (1 * one_votes)) / total_votes;

            return calculate_rating;
        }

        public async Task<List<GetAdminsStadiumViewModel>> GetAdminsStadiumById(string id, UserParam param, string root)
        {
            var stadiums = await _context.Stadium
                .Where(s => s.User_id == id)
                .Select(s => new GetAdminsStadiumViewModel { 
                    Id = s.Id,
                    Name = param.Lang == "en"? s.Name_en : s.Name_ar,
                    Address = s.Address,
                    Image = root + s.Stadium_images.FirstOrDefault(x => x.Stadium_id == s.Id).Image
                }).ToListAsync();

            return stadiums;
        }

        public async Task<List<FeaturesOfStadium>> GetFuturesForStadium(int id)
        {
            var futures = await _context.FeaturesOfStadium
                .Where(f => f.Stadium_id == id).ToListAsync();

            return futures;
        }

        public async Task<List<StadiumImage>> GetImagesForStadium(int id)
        {
            var staduim_images = await _context.StadiumImages
                .Where(i => i.Stadium_id == id).ToListAsync();

            return staduim_images;
        }

        public async Task<Stadium> GetStadium(int id)
        {
            var stadium = await _context.Stadium.FindAsync(id);

            return stadium;
        }

        public async Task<GetStadiumDetailsViewModel> GetStadiumDetailsById(int id, UserParam param)
        {
            var stadium = await GetStadium(id);

            var Details = new GetStadiumDetailsViewModel
            {
                Name = param.Lang == "en" ? stadium.Name_en : stadium.Name_ar,
                Address = stadium.Address,
                Description = stadium.Description,
                Latitude = stadium.Latitude,
                Longtiude = stadium.Longtiude,
                Price_per_hour = stadium.Price_per_hour,
                Rate = await CalculateStadiumRate(id)
            };

            return Details;
        }

        public async Task<GetStadiumDetailsForUpdateViewModel> GetStadiumDetailsForUpdateById(int id)
        {
            var stadium = await GetStadium(id);

            var Details = new GetStadiumDetailsForUpdateViewModel
            {
                Name_ar = stadium.Name_ar,
                Name_en = stadium.Name_en,
                Address = stadium.Address,
                Description = stadium.Description,
                Latitude = stadium.Latitude,
                Longtiude = stadium.Longtiude,
                Price_per_hour = stadium.Price_per_hour
            };

            return Details;
        }

        public async Task<List<int>> GetStadiumFeaturesById(int id)
        {
            var stadium_features = await _context.FeaturesOfStadium
                .Where(i => i.Stadium_id == id)
                .Select(x => x.Feature_id)
                .ToListAsync();

            return stadium_features;
        }

        public async Task<List<string>> GetStadiumImagesById(int id)
        {
            var stadium_images = await _context.StadiumImages
                .Where(i => i.Stadium_id == id)
                .Select(x => x.Image)
                .ToListAsync();

            return stadium_images;
        }

        public async Task<List<GetStadiumsForAdminViewModel>> GetStadiumsForAdminById(string id, UserParam param)
        {
            var stadiums_for_admin = await _context.Stadium
                .Where(s => s.User_id == id)
                .Select(s => new GetStadiumsForAdminViewModel { 
                    Id = s.Id,
                    Name = param.Lang == "en"? s.Name_en : s.Name_ar,
                    Address = s.Address,
                    Latitude = s.Latitude,
                    Longtiude = s.Longtiude,
                    Price_per_hour = s.Price_per_hour,
                    Description = s.Description,
                    City_id = s.City_id
                }).ToListAsync();

            return stadiums_for_admin;
        }

        public async Task<List<string>> GetStadiumTimesOfPlay(int id, UserParam param)
        {
            var times = await _context.TimesOfplays
                .Select(t => new GetStadiumTimesOfPlay { 
                    From = t.From,
                    To = t.To
                }).ToListAsync();

            var return_array = new List<string>();

            foreach (var time in times)
            {
                DateTime time_span = DateTime.Parse(time.From);
                DateTime time_span2 = DateTime.Parse(time.To);
                DateTime date_time_seprator = DateTime.Parse("12:00 PM");

                TimeSpan time1 = time_span.TimeOfDay;
                TimeSpan time2 = time_span2.TimeOfDay;
                TimeSpan date_time_seprator_time_span = date_time_seprator.TimeOfDay;

                while (time1 <= time2)
                {
                    var separator_time = time1 >= date_time_seprator_time_span ? " PM" : " AM";

                    return_array.Add(time1.ToString("hh\\:mm") + separator_time
                        + " : " + ((time1 == time2) ? time1 : time1 += TimeSpan.FromHours(param.setTime == 60 ? 1 : 2)).ToString("hh\\:mm") + separator_time);

                    time1 += TimeSpan.FromHours(param.setTime == 60 ? 1 : 2);
                }
            }

            return return_array;
        }

        public async Task<List<GetStadiumsAndFeaturesViewModel>> GetUpdateStadiumsAndFeaturesById(int id)
        {
            var model = new List<GetStadiumsAndFeaturesViewModel>();

            var images = await GetStadiumImagesById(id);
            var features_ids = await GetStadiumFeaturesById(id);

            foreach (var img in images)
            {
                foreach (var feature_id in features_ids)
                {
                    model.Add(new GetStadiumsAndFeaturesViewModel
                    {
                        Image = img,
                        Feature_id = feature_id
                    });
                }
            }

            return model;
        }

        public async Task<bool> IsStadiumExist(int id)
        {
            var is_stadium_exist_in_db = await _context.Stadium.AnyAsync(s => s.Id == id);

            return is_stadium_exist_in_db;
        }

        public async Task<bool> IsStadiumHasTheseFeatures(List<int> ids, int stadium_id)
        {
            var is_stadium_has_this_feature = false;

            foreach (var id in ids)
            {
                is_stadium_has_this_feature = await _context.FeaturesOfStadium
                    .Where(s => s.Stadium_id == stadium_id)
                    .AnyAsync(s => s.Feature_id == id);
            }

            return is_stadium_has_this_feature;
        }

        public async Task<bool> IsYouStadiumsOwner(string id, int stadium_id)
        {
            var stadium = await _context.Stadium.FirstOrDefaultAsync(s => s.Id == stadium_id);

            if (stadium.User_id == id)
            {
                return true;
            }

            return false;
        }

        public async Task<SaveStadiumResultViewModel> SaveStadium(SaveStadiumViewModel model)
        {
            if (model.Id != 0)
            {
                var stadium = await GetStadium(model.Id);

                if (stadium == null)
                {
                    return null;
                }
                else
                {
                    stadium.Name_ar = model.Name_ar;
                    stadium.Name_en = model.Name_en;
                    stadium.City_id = model.City_id == 0? stadium.City_id : model.City_id;
                    stadium.Address = model.Address;
                    stadium.Latitude = model.Latitude;
                    stadium.Longtiude = model.Longtiude;
                    stadium.Price_per_hour = model.Price_per_hour;
                    stadium.Description = model.Description;

                    await _repoCore.SaveAll();

                    return new SaveStadiumResultViewModel();
                }
            }
            else
            {
                var stadium = new Stadium
                {
                    Name_ar = model.Name_ar,
                    Name_en = model.Name_en,
                    City_id = model.City_id,
                    Address = model.Address,
                    Latitude = model.Latitude,
                    Longtiude = model.Longtiude,
                    Price_per_hour = model.Price_per_hour,
                    Description = model.Description,
                    User_id = model.User_id
                };

                _repoCore.Add(stadium);
                await _repoCore.SaveAll();

                return new SaveStadiumResultViewModel
                {
                    Id = stadium.Id
                };
            }
        }

        public async Task<bool> SaveStadiumFutures(int id, List<int> model, bool isUpdated)
        {
            foreach (var item in model)
            {
                if (isUpdated == true)
                {
                    var stadium_futures = await GetFuturesForStadium(id);

                    foreach (var future in stadium_futures)
                    {
                        _repoCore.Delete(future);
                    }

                    var new_futures = new FeaturesOfStadium
                    {
                        Stadium_id = id,
                        Feature_id = item
                    };

                    _repoCore.Add(new_futures);
                }
                else
                {
                    var stadiums_futures = new FeaturesOfStadium
                    {
                        Stadium_id = id,
                        Feature_id = item
                    };

                    _repoCore.Add(stadiums_futures);
                }
            }

            await _repoCore.SaveAll();

            return true;
        }

        public async Task<bool> SaveStadiumImages(int id, List<string> model, bool isUpdated, string root)
        {
            foreach (var item in model)
            {
                if (isUpdated == true)
                {
                    var stadiums_images = await GetImagesForStadium(id);

                    foreach (var img in stadiums_images)
                    {
                        string full_path = root + "/" + img.Image;
                        if (System.IO.File.Exists(full_path))
                        {
                            System.IO.File.Delete(full_path);
                        }

                        _repoCore.Delete(img);
                    }
                    
                    var New_stadium_images = new StadiumImage
                    {
                        Image = item,
                        Stadium_id = id
                    };

                    _repoCore.Add(New_stadium_images);
                }
                else {

                    var stadium_images = new StadiumImage
                    {
                        Image = item,
                        Stadium_id = id
                    };

                    _repoCore.Add(stadium_images);
                }
            }
            
            await _repoCore.SaveAll();
            return true;
        }

    }
}
