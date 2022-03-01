using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class ReservationStatus
    {
        [Key]
        public int Id { get; set; }

        public string State { get; set; }

        public ICollection<Reservation> Reservations { get; set; }
    }
}
