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
        public string Feature { get; set; }
    }
}
