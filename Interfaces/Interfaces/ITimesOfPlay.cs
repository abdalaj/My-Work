using Entites.Models;
using Interfaces.Base;
using Interfaces.ViewModels.StadiumVM;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.Interfaces
{
    public interface ITimesOfPlay : IService
    {
        Task<TimesOfplay> GetTimeOfplay(int id);
        Task<bool> SaveTimeOfPlay(int stadiumId, SaveTimesOfPlayViewModel model);

    }
}
