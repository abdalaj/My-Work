using Interfaces.Helper;
using Interfaces.Interfaces;
using Interfaces.ViewModels.UserVM;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Claims;
using System.Threading.Tasks;

namespace App.Api
{
    [Route("api/[controller]")]
    [ApiController]
    public class ContactsController : ControllerBase
    {
        private  IContact _repo;
        public ContactsController(IContact repo)
        {
            _repo = repo;
        }

        [Authorize(Policy = "UserRole")]
        [HttpPost]
        public async Task<IActionResult> SaveContactUs(SaveContactUsViewModel model)
        {
            try
            {
                if (string.IsNullOrEmpty(model.Name))
                {
                    return BadRequest(new { messageError = 7 }); // name must be fill
                }

                if (string.IsNullOrEmpty(model.Phone))
                {
                    return BadRequest(new { messageError = 3 }); // phone must be fill
                }

                model.User_id = User.FindFirst(ClaimTypes.NameIdentifier).Value;
                var result = await _repo.SaveContactUs(model);

                if (!result)
                {
                    return BadRequest(new { messageError = 41 }); // failed send message
                }

                return Ok(new { messageSuccess = 1 });
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 42 }); // error while sending message
            }
        }

        [Authorize(Policy = "SuperAdminRole")]
        [HttpPost("pagination")]
        public async Task<IActionResult> GetContactMessagesWithPagination([FromQuery] UserParam param)
        {
            try
            {
                // Datatable Pagination Server Side Properties
                var draw = Request.Form["draw"].FirstOrDefault();
                var start = Request.Form["start"].FirstOrDefault();
                var length = Request.Form["length"].FirstOrDefault();
                var searchValue = Request.Form["search[value]"].FirstOrDefault();
                int pageSize = length != null ? Convert.ToInt32(length) : 0;
                int PageNumber = (int.Parse(start) / pageSize);
                // Datatable Properties End

                var contacts = await _repo.GetAllContactMessagesWithPagination(new UserParam
                {
                    PageNumber = PageNumber,
                    PageSize = pageSize,
                    Key = searchValue
                });

                // Send to View 
                var jsonData = new
                {
                    recordsFiltered = contacts.TotalCount,
                    recordsTotal = contacts.TotalCount,
                    data = contacts
                };
                // Send to View End

                return Ok(jsonData);
            }
            catch (Exception e)
            {
                return BadRequest(e.Message);
            }

        }
    }
}
