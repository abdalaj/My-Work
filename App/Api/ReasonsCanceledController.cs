using Interfaces.Helper;
using Interfaces.Interfaces;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace App.Api
{
    [Route("api/[controller]")]
    [ApiController]
    public class ReasonsCanceledController : ControllerBase
    {
        private IReasone _repo;
        public ReasonsCanceledController(IReasone repo)
        {
            _repo = repo;
        }

        [Authorize(Policy = "UserRole")]
        [HttpGet]
        public async Task<IActionResult> GetReasons([FromQuery] UserParam param)
        {
            var result = await _repo.GetReasones(param);

            return Ok(result);
        }

        [Authorize(Policy = "SuperAdminRole")]
        [HttpPost("pagination")]
        public async Task<IActionResult> GetReasonsWithPagination([FromQuery] UserParam param)
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

                var reasons = await _repo.GetReasonsWithPagination(new UserParam
                {
                    PageNumber = PageNumber,
                    PageSize = pageSize,
                    Key = searchValue
                });

                // Send to View 
                var jsonData = new
                {
                    recordsFiltered = reasons.TotalCount,
                    recordsTotal = reasons.TotalCount,
                    data = reasons
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
