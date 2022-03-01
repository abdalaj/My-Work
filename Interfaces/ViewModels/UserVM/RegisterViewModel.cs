using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.UserVM
{
    public class RegisterViewModel
    {
        public string Id { get; set; }
        public string Name { get; set; }
        public string Password { get; set; }
        public string Password_confirm { get; set; }
        public string Country_code { get; set; }
        public string Phone { get; set; }
        public string Role { get; set; }
        public List<string> Images { get; set; }
    }
}
