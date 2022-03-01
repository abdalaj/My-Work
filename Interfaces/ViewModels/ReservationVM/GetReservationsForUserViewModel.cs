using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.ReservationVM
{
    public class GetReservationsForUserViewModel
    {
        public int Id { get; set; }
        public string Date { get; set; }
        public string Time { get; set; }
        public string Reservation_state { get; set; }
        public int Stadium_id { get; set; }
        public string Stadium_name { get; set; }
        public string Image_url { get; set; }
    }
}
