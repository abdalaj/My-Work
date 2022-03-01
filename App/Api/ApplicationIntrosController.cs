using Interfaces.Helper;
using Interfaces.Interfaces;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Threading.Tasks;

namespace App.Api
{
    [Route("api/[controller]")]
    [ApiController]
    public class ApplicationIntrosController : ControllerBase
    {
        private IApplicationIntro _repo;
        private IWebHostEnvironment _webHost;
        public ApplicationIntrosController(IApplicationIntro repo,
            IWebHostEnvironment webHost)
        {
            _repo = repo;
            _webHost = webHost;
        }

        [HttpGet]
        public async Task<IActionResult> GetApplicationIntros([FromQuery] UserParam param)
        {
            var root = Path.Combine(_webHost.WebRootPath, "/upload/");
            var result = await _repo.GetApplicationIntros(param, root);

            return Ok(result);
        }

        [Authorize(Policy = "SuperAdminRole")]
        [HttpPost("pagination")]
        public async Task<IActionResult> GetApplicationIntrosWithPagination([FromQuery] UserParam param)
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

                var intros = await _repo.GetIntroWithPagination(new UserParam
                {
                    PageNumber = PageNumber,
                    PageSize = pageSize,
                    Key = searchValue
                });

                // Send to View 
                var jsonData = new
                {
                    recordsFiltered = intros.TotalCount,
                    recordsTotal = intros.TotalCount,
                    data = intros
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
