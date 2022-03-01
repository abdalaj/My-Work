using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.RatingVM
{
    public class SaveRatingViewModel
    {
        public int Stadium_id { get; set; }
        public string User_id { get; set; }

        [Range(1, 5)]
        public int Rating { get; set; }
    }
}
