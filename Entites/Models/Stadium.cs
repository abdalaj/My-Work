using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class Stadium
    {
        [Key]
        public int Id { get; set; }

        public string Name_ar { get; set; }

        public string Name_en { get; set; }

        public string Government { get; set; }

        public string Address { get; set; }

        public string Latitude { get; set; }

        public string Longtiude { get; set; }

        public decimal Price_per_hour { get; set; }

        public string Description { get; set; }
    }
}
