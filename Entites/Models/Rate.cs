using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class Rate
    {
        public string User_id { get; set; }
        public int Stadium_id { get; set; }

        [Required]
        public int Rating { get; set; }

        public Users Users { get; set; }
        public Stadium Stadium { get; set; }
    }
}
