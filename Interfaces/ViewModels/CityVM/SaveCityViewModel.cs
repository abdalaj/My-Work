using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.StadiumVM
{
    public class SaveCityViewModel
    {
        public int Id { get; set; }

        [Required(ErrorMessage = "Please fill input")]
        public string Name_ar { get; set; }

        [Required(ErrorMessage = "Please fill input")]
        public string Name_en { get; set; }

        [Required(ErrorMessage = "Please select Government")]
        public int? Government_id { get; set; }

        public List<GetGovenmentViewModel> Government_drop_down_list { get; set; }

        public string Error { get; set; } = string.Empty;
    }
}
