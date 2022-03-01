using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.PushNotificationVM
{
    public class PushNotificationAttributeVM
    {
        public int Id { get; set; }
        public string Title { get; set; }
        public string Case { get; set; }
        public string Body { get; set; }
        public string[] DeviceIds { get; set; }
        public string DeviceId { get; set; }
        public int? EntityTypeId { get; set; }
        public int? EntityId { get; set; }
        public dynamic Data { get; set; }
        public string imagePath { get; set; }
    }
}
