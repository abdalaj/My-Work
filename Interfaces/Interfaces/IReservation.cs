using Entites.Models;
using Interfaces.Base;
using Interfaces.Helper;
using Interfaces.ViewModels.ReservationVM;
using Interfaces.ViewModels.StadiumVM;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.Interfaces
{
    public interface IReservation : IService
    {
        Task<bool> CheckIfReservationExistForThisStadium(string user_id, int stadium_id);
        Task<bool> IsYourReservationsOwner(string id, int reservation_id);
        Task<bool> CancelResevation(int id);
        Task<bool> ReservationExpired(int id);
        Task<bool> CheckIfReservationExpired(int id);
        Task<Reservation> GetReservation(int id);
        Task<bool> MakeReservation(int stadiumId, MakeReservationViewModel model);
        Task<List<GetReservationsForUserViewModel>> GetReservationsForUserById(string id, UserParam param, string root);
        Task<List<GetReservationsForAdminViewModel>> GetReservationsForAdminById(string id, string root);
        Task<List<GetReservationDetailsViewModel>> GetReservationDetails(int id, UserParam param);
        Task<List<GetCanceledReservationForAdminViewModel>> GetCanceledReservationForAdminById(string id, string root);
        Task<bool> SetReasonCanceled(int id, SetReasonViewModel model);
    }
}
