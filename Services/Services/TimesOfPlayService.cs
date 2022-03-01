using Entites.Models;
using Interfaces.Interfaces;
using Interfaces.ViewModels.StadiumVM;
using Services.Base;
using Services.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Services.Services
{
    public class TimesOfPlayService : BaseService , ITimesOfPlay
    {
        private ICoreBase _repoCore;
        private AppDbContext _context;
        public TimesOfPlayService(ICoreBase repoCore,
            AppDbContext context)
        {
            _repoCore = repoCore;
            _context = context;
        }

        public async Task<bool> SaveTimeOfPlay(int stadiumId, SaveTimesOfPlayViewModel model)
        {
            foreach (var item in model.TimesPlay)
            {
                if (item.Id != 0)
                {
                    var update_time_of_play = await GetTimeOfplay(item.Id);

                    if (update_time_of_play == null)
                    {
                        return false;
                    }

                    update_time_of_play.From = item.From;
                    update_time_of_play.To = item.To;
                }
                else
                {
                    var create_time_of_play = new TimesOfplay
                    {

                        Day_code = item.Day_code,
                        From = item.From,
                        To = item.To,
                        Stadium_id = stadiumId
                    };

                    _repoCore.Add(create_time_of_play);
                }
            }

            await _repoCore.SaveAll();

            return true;
        }


        public async Task<TimesOfplay> GetTimeOfplay(int id)
        {
            var time = await _context.TimesOfplays.FindAsync(id);

            return time;
        }

    }
}
