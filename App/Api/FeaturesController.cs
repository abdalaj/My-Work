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
    public class FeaturesController : ControllerBase
    {
        private IFeature _repo;
        public FeaturesController(IFeature repo)
        {
            _repo = repo;
        }

        [Authorize(Policy = "AdminRole")]
        [HttpGet]
        public async Task<IActionResult> GetFutures([FromQuery] UserParam param)
        {
            var futures = await _repo.GetFutures(param);

            return Ok(futures);
        }

        [Authorize(Policy = "SuperAdminRole")]
        [HttpPost("pagination")]
        public async Task<IActionResult> GetFuturesWithPagination([FromQuery] UserParam param)
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

                var future = await _repo.GetFutureWithPagination(new UserParam
                {
                    PageNumber = PageNumber,
                    PageSize = pageSize,
                    Key = searchValue
                });

                // Send to View 
                var jsonData = new
                {
                    recordsFiltered = future.TotalCount,
                    recordsTotal = future.TotalCount,
                    data = future
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
