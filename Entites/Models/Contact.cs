using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class Contact
    {
        [Key]
        public int Id { get; set; }

        [Required]
        public string Message { get; set; }

        public string User_id { get; set; }
        [ForeignKey(nameof(User_id))]
        public Users Users { get; set; }
    }
}
