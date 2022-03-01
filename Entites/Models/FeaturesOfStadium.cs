using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Entites.Models
{
    public class FeaturesOfStadium
    {
        public int Stadium_id { get; set; }
        public int Feature_id { get; set; }

        public Stadium Stadium { get; set; }
        public Features Feature { get; set; }
    }
}
