﻿using Interfaces.Helper;
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
    public class IntrosController : ControllerBase
    {
        private IApplicationIntro _repo;
        public IntrosController(IApplicationIntro repo)
        {
            _repo = repo;
        }


        [Authorize(Policy = "SuperAdminRole")]
        [HttpPost("pagination")]
        public async Task<IActionResult> GetIntrosWithPagination([FromQuery] UserParam param)
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
