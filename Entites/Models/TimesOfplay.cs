using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class TimesOfplay
    {
        [Key]
        public int Id { get; set; }

        [Required]
        public int Day_code { get; set; }

        [Required]
        public string From { get; set; }

        [Required]
        public string To { get; set; }

        public int Stadium_id { get; set; }
        [ForeignKey(nameof(Stadium_id))]
        public Stadium Stadium { get; set; }
    }
}
