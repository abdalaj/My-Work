using Entites.Models;
using Interfaces.Helper;
using Interfaces.Interfaces;
using Interfaces.ViewModels.UserVM;
using Microsoft.EntityFrameworkCore;
using Services.Base;
using Services.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Services.Services
{
    public class ContactService : BaseService , IContact
    {
        private ICoreBase _repoCore;
        private AppDbContext _context;
        public ContactService(ICoreBase repoCore,
            AppDbContext context)
        {
            _repoCore = repoCore;
            _context = context;
        }

        public async Task<PagedList<GetAllContactMessagesViewModel>> GetAllContactMessagesWithPagination(UserParam param)
        {
            var contact_messages = _context.Contacts
                .Include(c => c.Users)
                .Select(c => new GetAllContactMessagesViewModel
                {
                    Id = c.Id,
                    Message = c.Message,
                    User_name = c.Users.Name
                }).AsQueryable();

            if (!string.IsNullOrEmpty(param.Key))
            {
                contact_messages = contact_messages.Where(c => c.User_name == param.Key);
            }

            return await PagedList<GetAllContactMessagesViewModel>
                .CreateAsync(contact_messages, param.PageNumber, param.PageSize);
        }

        public async Task<bool> SaveContactUs(SaveContactUsViewModel model)
        {
            var contact = new Contact
            {
                User_id = model.User_id,
                Message = model.Message
            };

            _repoCore.Add(contact);
            await _repoCore.SaveAll();

            return true;
        }

    }
}
