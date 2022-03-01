using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.StadiumVM
{
    public class GetStadiumDetailsViewModel
    {
        public string Name { get; set; }

        public string Address { get; set; }

        public decimal Latitude { get; set; }

        public decimal Longtiude { get; set; }

        public decimal Price_per_hour { get; set; }

        public string Description { get; set; }

        public decimal Rate { get; set; }
    }
}
