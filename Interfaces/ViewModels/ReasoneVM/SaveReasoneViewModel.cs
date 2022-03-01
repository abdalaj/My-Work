using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.ReasoneVM
{
    public class SaveReasoneViewModel
    {
        public int Id { get; set; }

        [Required(ErrorMessage = "This field can't be empty")]
        public string Reasone_en { get; set; }

        [Required(ErrorMessage = "This field can't be empty")]
        public string Reasone_ar { get; set; }
    }
}
