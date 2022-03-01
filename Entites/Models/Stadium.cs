using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class Stadium
    {
        [Key]
        public int Id { get; set; }

        [Required]
        public string Name_ar { get; set; }

        [Required]
        public string Name_en { get; set; }

        [Required]
        public string Address { get; set; }

        [Required]
        public decimal Latitude { get; set; }

        [Required]
        public decimal Longtiude { get; set; }

        [Required]
        public decimal Price_per_hour { get; set; }

        [Required]
        public string Description { get; set; }

        public ICollection<StadiumImage> Stadium_images { get; set; }

        public ICollection<FeaturesOfStadium> Features_of_stadium { get; set; }

        public ICollection<TimesOfplay> Times_of_plays { get; set; }

        public ICollection<Reservation> Reservation { get; set; }

        public ICollection<Rate> Ratings { get; set; }


        [Required]
        public int City_id { get; set; }
        [ForeignKey(nameof(City_id))]
        public City City { get; set; }

        public string User_id { get; set; }
        [ForeignKey(nameof(User_id))]
        public Users Users { get; set; }
    }
}
