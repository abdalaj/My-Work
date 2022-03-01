using Interfaces.ViewModels.PushNotificationVM;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.Helper
{
    public class PushNotification
    {
        private readonly string appId = "AAAAHa3B2qA:APA91bGAZGhL1mpWLnl8womSu1EBhFpUiEbLCklFV2fc4ZClGZR8FI7rY7ftszzct5LleLLzDszq3iShdDHVUu5Qw4sYH2jyFWJ93-sG_DxWL9RGBY6hQKpxwKdSlwIKSZayJTQMgtK8";
        public string ApplicationID { get; set; }
        public PushNotification()
        {
            ApplicationID = appId;
        }

        public int Push(PushNotificationAttributeVM obj)
        {
            try
            {
                string[] TempdeviceId;

                string[] deviceId = obj.DeviceIds;
                string toid = deviceId.FirstOrDefault().ToString();

                var data = new object();

                if (deviceId.Length == 1)
                {
                    data = new
                    {
                        to = toid,
                        notification = new

                        {
                            body = obj.Body,
                            title = obj.Title,
                            caseNumber = obj.Case,
                            tag = obj.Case
                        }
                        //data = Data
                    };
                    Send(data);
                }
                else if (deviceId.Length > 1)
                {
                    double count = Convert.ToDouble(deviceId.Length) / 1000.0;

                    int arrLength = 1000;
                    for (double i = 0; i <= count; i++)
                    {
                        int temp = deviceId.Length - Convert.ToInt32((i * 1000));
                        if (temp >= 1000)
                        {
                            arrLength = 1000;
                        }
                        else
                        {
                            arrLength = deviceId.Length - Convert.ToInt32((i * 1000));
                        }

                        TempdeviceId = new string[arrLength];
                        TempdeviceId = deviceId.ToList().Skip(Convert.ToInt32(i) * 1000).Take(arrLength).ToArray();
                        data = new
                        {
                            registration_ids = deviceId,
                            notification = new
                            {
                                body = obj.Body,
                                title = obj.Title,
                                caseNumber = obj.Case,
                                tag = obj.Case
                            }
                            //data = Data
                        };
                        Send(data);
                    }
                }
                return 1;
            }

            catch (Exception ex)
            {

                string str = ex.Message;
                return -1;
            }

        }

        public int PushHiddenNotification(PushNotificationAttributeVM obj)
        {
            try
            {

                string[] TempdeviceId;

                object Data = null;
                if (obj.Data != null)
                {
                    Data = new

                    {
                        EntityTypeId = obj.EntityTypeId,
                        EntityId = obj.EntityId,
                        Object = obj.Data,
                        ImagePath = obj.imagePath
                    };
                }
                else
                {
                    Data = new

                    {
                        EntityTypeId = obj.EntityTypeId,
                        EntityId = obj.EntityId,
                        ImagePath = obj.imagePath
                    };
                }

                string[] deviceId = obj.DeviceIds;
                string toid = deviceId.FirstOrDefault().ToString();

                var data = new object();

                if (deviceId.Length == 1)
                {
                    data = new
                    {
                        to = toid,
                        data = Data
                    };
                    Send(data);
                }
                else if (deviceId.Length > 1)
                {
                    double count = Convert.ToDouble(deviceId.Length) / 1000.0;

                    int arrLength = 1000;
                    for (double i = 0; i <= count; i++)
                    {
                        int temp = deviceId.Length - Convert.ToInt32((i * 1000));
                        if (temp >= 1000)
                        {
                            arrLength = 1000;
                        }
                        else
                        {
                            arrLength = deviceId.Length - Convert.ToInt32((i * 1000));
                        }

                        TempdeviceId = new string[arrLength];
                        TempdeviceId = deviceId.ToList().Skip(Convert.ToInt32(i) * 1000).Take(arrLength).ToArray();
                        data = new
                        {
                            registration_ids = deviceId,
                            data = Data
                        };
                        Send(data);

                    }

                }
                return 1;
            }

            catch (Exception ex)
            {

                string str = ex.Message;
                return -1;
            }

        }

        public int Chat(ChatAtrrViewModel obj)
        {
            try
            {
                //string deviceId = "dR9OuqXbOfg:APA91bErVbutr44Jdx5ZQoEiLJbARMfHxaFAZoC-YdeNVHHI-eWI5PXFQH8kcC4VQXsO1RV5I3U48mLGIACeDclmNwIFousJg76jW6cxaLxA1lS3R_n1fbXMeoTUAYsD6aIYLcMhTsSz";


                string toid = obj.DeviceId;
                WebRequest tRequest = WebRequest.Create("https://fcm.googleapis.com/fcm/send");


                tRequest.Method = "post";

                tRequest.ContentType = "application/json";
                var data = new object();

                data = new

                {

                    to = toid,
                    //"d8ixTkOytd0:APA91bGmdnobwqdBZIrLktUxTWPZw_4G-viR_ZSQQaKuLos_oRz_yFDEZ5OHrxzwatUjwHKFSN50xTybRItOVodWuSphtsBjQqsYMsjbapxgzcc11zuVeTIkxH_zqo__NzwVQcNrfVkV",
                    //  registration_ids = deviceId,
                    notification = new

                    {

                        body = obj.Body,
                        title = obj.Title

                    },
                    data = new

                    {
                        EntityTypeId = 99,
                        EntityId = obj.SenderUserId,
                        OrderId = obj.OrderId,
                        FlgMessageType = obj.FlgMessageType,
                        MediaUrl = obj.MediaUrl,
                        Message = obj.Message,
                        FlgSystem = obj.FlgSystem

                    }
                };



                //   var serializer = new JavaScriptSerializer();

                var json = JsonConvert.SerializeObject(data);

                Byte[] byteArray = Encoding.UTF8.GetBytes(json);

                tRequest.Headers.Add(string.Format("Authorization: key={0}", ApplicationID));

                tRequest.ContentLength = byteArray.Length;


                using (Stream dataStream = tRequest.GetRequestStream())
                {

                    dataStream.Write(byteArray, 0, byteArray.Length);


                    using (WebResponse tResponse = tRequest.GetResponse())
                    {

                        using (Stream dataStreamResponse = tResponse.GetResponseStream())
                        {

                            using (StreamReader tReader = new StreamReader(dataStreamResponse))
                            {

                                String sResponseFromServer = tReader.ReadToEnd();

                                string str = sResponseFromServer;
                                return 1;

                            }
                        }
                    }
                }
            }

            catch (Exception ex)
            {

                string str = ex.Message;
                return -1;
            }

        }

        public void Send(object o)
        {
            WebRequest tRequest = WebRequest.Create("https://fcm.googleapis.com/fcm/send");


            tRequest.Method = "post";

            tRequest.ContentType = "application/json";


            var json = JsonConvert.SerializeObject(o);

            Byte[] byteArray = Encoding.UTF8.GetBytes(json);

            tRequest.Headers.Add(string.Format("Authorization: key={0}", ApplicationID));

            tRequest.ContentLength = byteArray.Length;


            using (Stream dataStream = tRequest.GetRequestStream())
            {

                dataStream.Write(byteArray, 0, byteArray.Length);


                using (WebResponse tResponse = tRequest.GetResponse())
                {

                    using (Stream dataStreamResponse = tResponse.GetResponseStream())
                    {

                        using (StreamReader tReader = new StreamReader(dataStreamResponse))
                        {

                            String sResponseFromServer = tReader.ReadToEnd();

                            string str = sResponseFromServer;
                            // return 1;

                        }
                    }
                }
            }

        }


    }
}
