using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class Reservation
    {
        [Key]
        public int Id { get; set; }

        [Required]
        public DateTime Date { get; set; }

        [Required]
        public string Time { get; set; }

        public string Reason_canceled { get; set; }

        public string User_id { get; set; }
        [ForeignKey(nameof(User_id))]
        public Users Users { get; set; }

        public int Stadium_id { get; set; }
        [ForeignKey(nameof(Stadium_id))]
        public Stadium Stadium { get; set; }

        public int Reservation_state_id { get; set; }
        [ForeignKey(nameof(Reservation_state_id))]
        public ReservationStatus ReservationStatus { get; set; }
    }
}
