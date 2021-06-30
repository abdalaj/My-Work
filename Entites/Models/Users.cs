using Microsoft.AspNetCore.Identity;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class Users : IdentityUser
    {
        public string Name { get; set; }
        public string Country_code { get; set; }
    }
}
