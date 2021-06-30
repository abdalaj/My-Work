using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.UserVM
{
    public class ResetPasswordViewModel
    {
        public string Country_code { get; set; }
        public string Phone { get; set; }
        public string New_Password { get; set; }
        public string Password_confirm { get; set; }
    }
}
