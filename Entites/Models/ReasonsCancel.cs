using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class ReasonsCancel
    {
        [Key]
        public int Id { get; set; }

        [Required]
        public string Reason_ar { get; set; }

        [Required]
        public string Reason_en { get; set; }
    }
}
