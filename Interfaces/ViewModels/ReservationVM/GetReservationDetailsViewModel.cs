using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.ReservationVM
{
    public class GetReservationDetailsViewModel
    {
        public string Name { get; set; }
        public string Phone { get; set; }
        public string Date { get; set; }
        public string Time { get; set; }
        public decimal Total_price { get; set; }
        public string Stadium_name { get; set; }
    }
}
