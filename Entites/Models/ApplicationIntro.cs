using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class ApplicationIntro
    {
        [Key]
        public int Id { get; set; }

        [Required]
        public string Description_en { get; set; }

        [Required]
        public string Description_ar { get; set; }

        [Required]
        public string Image { get; set; }
    }
}
