using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class City
    {
        public int Id { get; set; } 

        [Required]
        public string Name_ar { get; set; }

        [Required]
        public string Name_en { get; set; }

        [Required]
        public int Government_id { get; set; }
        [ForeignKey(nameof(Government_id))]
        public Government Government { get; set; }
    }
}
