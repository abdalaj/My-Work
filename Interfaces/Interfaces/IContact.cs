using Interfaces.Base;
using Interfaces.Helper;
using Interfaces.ViewModels.UserVM;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.Interfaces
{
    public interface IContact : IService
    {
        Task<bool> SaveContactUs(SaveContactUsViewModel model);
        Task<PagedList<GetAllContactMessagesViewModel>> GetAllContactMessagesWithPagination(UserParam param);
    }
}
