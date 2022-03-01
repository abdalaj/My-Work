using Entites.Models;
using Interfaces.Helper;
using Interfaces.Interfaces;
using Interfaces.ViewModels.ReservationVM;
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
    public class ReservationService : BaseService , IReservation
    {
        private ICoreBase _repoCore;
        private AppDbContext _context;
        public ReservationService(ICoreBase repoCore,
            AppDbContext context)
        {
            _repoCore = repoCore;
            _context = context;
        }

        public async Task<bool> CancelResevation(int id)
        {
            var reservation = await GetReservation(id);

            reservation.Reservation_state_id = 2;

            await _repoCore.SaveAll();

            return true;
        }

        public async Task<bool> CheckIfReservationExistForThisStadium(string user_id, int stadium_id)
        {
            var is_reservation_exist_for_stadium = await _context.Reservation
                .AnyAsync(r => r.User_id == user_id && r.Stadium_id == stadium_id);

            return is_reservation_exist_for_stadium;
        }

        public async Task<bool> CheckIfReservationExpired(int id)
        {
            var reservation = await GetReservation(id);

            if (reservation.Date < DateTime.Now)
            {
                return true; // if expired
            }

            return false; // if non expired
        }

        public async Task<List<GetCanceledReservationForAdminViewModel>> GetCanceledReservationForAdminById(string id, string root)
        {
            var reservation_canceled = await _context.Reservation
                .Where(r => r.Stadium.User_id == id && r.Reservation_state_id == 2)
                .Select(r => new GetCanceledReservationForAdminViewModel
                {
                    Id = r.Id,
                    User_id = r.User_id,
                    Date = r.Date.ToString("dd/MM/yyyy"),
                    Time = r.Time,
                    Image_url = root + _context.User.FirstOrDefault(u => u.Id == r.User_id).Image
                }).ToListAsync();

            return reservation_canceled;
        }

        public async Task<Reservation> GetReservation(int id)
        {
            var reservation = await _context.Reservation.FindAsync(id);

            return reservation;
        }

        public async Task<List<GetReservationDetailsViewModel>> GetReservationDetails(int id, UserParam param)
        {
            var reservation_details = await _context.Reservation
                .Include(r => r.Stadium)
                .Include(r => r.Users)
                .Where(r => r.Id == id)
                .Select(r => new GetReservationDetailsViewModel { 
                    Name = r.Users.Name,
                    Phone = r.Users.Country_code + r.Users.PhoneNumber,
                    Date = r.Date.ToString("M/d/yyyy"),
                    Time = r.Time,
                    Stadium_name = param.Lang == "en"? r.Stadium.Name_en : r.Stadium.Name_ar,
                    Total_price = param.setTime == 60? (r.Stadium.Price_per_hour) : (r.Stadium.Price_per_hour * 2)
                }).ToListAsync();

            return reservation_details;
        }

        public async Task<List<GetReservationsForAdminViewModel>> GetReservationsForAdminById(string id, string root)
        {
            var reservations = await _context.Reservation
                .Where(r => r.Stadium.User_id == id)
                .Select(r => new GetReservationsForAdminViewModel
                {
                    Id = r.Id,
                    User_id = r.User_id,
                    Date = r.Date.ToString("M/d/yyyy"),
                    Time = r.Time,
                    Image_url = root + _context.User.FirstOrDefault(u => u.Id == r.User_id).Image
                }).ToListAsync();

            return reservations;
        }

        public async Task<List<GetReservationsForUserViewModel>> GetReservationsForUserById(string id, UserParam param, string root)
        {
            var reservations = await _context.Reservation
                .Where(r => r.User_id == id && _context.Roles.Any(x => x.Name == "User"))
                .Include(r => r.ReservationStatus)
                .Include(r => r.Stadium)
                .Select(r => new GetReservationsForUserViewModel { 
                    Id = r.Id,
                    Date = r.Date.ToString("M/d/yyyy"),
                    Time = r.Time,
                    Stadium_id = r.Stadium_id,
                    Reservation_state = r.ReservationStatus.State,
                    Stadium_name = param.Lang == "en"? r.Stadium.Name_en : r.Stadium.Name_ar,
                    Image_url = root + _context.StadiumImages.FirstOrDefault(s => s.Stadium_id == r.Stadium_id).Image
                }).ToListAsync();

            foreach (var reservation in reservations)
            {
                if (await CheckIfReservationExpired(reservation.Id))
                {
                    await ReservationExpired(reservation.Id);
                }
            }

            return reservations;
        }

        public async Task<bool> IsYourReservationsOwner(string id, int reservation_id)
        {
            var reservation = await GetReservation(reservation_id);

            if (reservation.User_id == id)
            {
                return true;
            }

            return false;
        }

        public async Task<bool> MakeReservation(int stadiumId, MakeReservationViewModel model)
        {
            var reservation = new Reservation
            {
                Stadium_id = stadiumId,
                Date = DateTime.Parse(model.Date),
                Time = model.Time,
                User_id = model.User_id,
                Reservation_state_id = 1,
                Reason_canceled = null
            };

            _repoCore.Add(reservation);
            await _repoCore.SaveAll();

            return true;
        }

        public async Task<bool> ReservationExpired(int id)
        {
            var reservation = await GetReservation(id);

            reservation.Reservation_state_id = 3;

            await _repoCore.SaveAll();

            return true;
        }

        public async Task<bool> SetReasonCanceled(int id, SetReasonViewModel model)
        {
            var reservation = await GetReservation(id);

            if (reservation == null)
            {
                return false;
            }

            reservation.Reason_canceled = model.Reason;

            await _repoCore.SaveAll();

            return true;
        }
    }
}
