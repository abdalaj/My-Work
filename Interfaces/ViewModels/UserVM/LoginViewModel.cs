using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.UserVM
{
    public class LoginViewModel
    {
        public string Country_code { get; set; }
        public string Phone { get; set; }
        public string Name { get; set; }
        public string Password { get; set; }
        public string Error { get; set; } = string.Empty;
    }
}
