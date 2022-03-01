using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.StadiumVM
{
    public class SaveStadiumViewModel
    {
        public int Id { get; set; }

        public string Name_ar { get; set; }

        public string Name_en { get; set; }

        public string Address { get; set; }

        public decimal Latitude { get; set; }

        public decimal Longtiude { get; set; }

        public decimal Price_per_hour { get; set; }

        public string Description { get; set; }

        public int City_id { get; set; }

        public string User_id { get; set; }
    }
}
