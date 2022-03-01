using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.ReservationVM
{
    public class GetReservationsForAdminViewModel
    {
        public int Id { get; set; }
        public string User_id { get; set; }
        public string Date { get; set; }
        public string Time { get; set; }
        public string Image_url { get; set; }
    }
}
