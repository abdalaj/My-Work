using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class Features
    {
        [Key]
        public int Id { get; set; }

        [Required]
        public string Name_ar { get; set; }

        [Required]
        public string Name_er { get; set; }

        public ICollection<FeaturesOfStadium> Features_of_stadium { get; set; }

    }
}
