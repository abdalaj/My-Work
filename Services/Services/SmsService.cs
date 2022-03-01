using Interfaces.Interfaces;
using Services.Base;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Twilio;
using Twilio.Rest.Api.V2010.Account;
using Twilio.Types;

namespace Services.Services
{
    public class SmsService : BaseService, ISms
    {
        public async Task<bool> SendMessage(string phone, string body)
        {
            var accountSid = "";
            var authToken = "";
            TwilioClient.Init(accountSid, authToken);

            var to = new PhoneNumber(phone);
            var from = new PhoneNumber("");

            var message = await MessageResource.CreateAsync(to: to, from: from, body: body);

            if (message.Sid == null)
                return false;

            return true;
        }
    }
}
