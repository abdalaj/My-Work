using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.ViewModels.PushNotificationVM
{
    public class ChatAtrrViewModel
    {
        public int Id { get; set; }
        public int? SenderUserId { get; set; }
        public int? OrderId { get; set; }
        public string Title { get; set; }
        public string Body { get; set; }
        public string DeviceId { get; set; }
        public byte FlgMessageType { get; set; }
        public string MediaUrl { get; set; }
        public string Message { get; set; }
        public bool FlgSystem { get; set; }
    }
}
