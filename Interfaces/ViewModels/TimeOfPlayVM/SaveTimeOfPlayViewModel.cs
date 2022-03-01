using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.StadiumVM
{
    public class SaveTimeOfPlayViewModel
    {
        public int Id { get; set; }
        public int Day_code { get; set; }
        public string From { get; set; }
        public string To { get; set; }
    }
}
