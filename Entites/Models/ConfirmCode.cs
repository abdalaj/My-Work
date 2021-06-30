using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class ConfirmCode
    {
        [Key]
        public int Id { get; set; }
        public string Country_code { get; set; }
        public string Phone { get; set; }
        public string Code { get; set; }
    }
}
