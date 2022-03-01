using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.Helper
{
    public class UserParam
    {
        private const int MaxPageSize = 50;
        public int PageNumber { get; set; } = 0;

        public int PageSize = 10;

        public string Lang { get; set; }
        public string Key { get; set; }
        public int setTime { get; set; }
    }
}
