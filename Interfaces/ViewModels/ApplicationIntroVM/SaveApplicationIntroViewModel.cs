using Microsoft.AspNetCore.Http;
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.IntroVM
{
    public class SaveApplicationIntroViewModel
    {
        public int Id { get; set; }

        [Required(ErrorMessage = "This field can't be empty")]
        public string Description_en { get; set; }

        [Required(ErrorMessage = "This field can't be empty")]
        public string Description_ar { get; set; }

        public string Image { get; set; }

        public IFormFile File { get; set; }

        public string Error { get; set; } = string.Empty;
    }
}
