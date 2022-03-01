using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class Government
    {
        public int Id { get; set; }

        [Required]
        public string Name_ar { get; set; }

        [Required]
        public string Name_en { get; set; }

        public ICollection<City> Cities { get; set; }
    }
}
