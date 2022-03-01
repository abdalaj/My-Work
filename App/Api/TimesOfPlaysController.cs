using Interfaces.Interfaces;
using Interfaces.ViewModels.StadiumVM;
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
    public class TimesOfPlaysController : ControllerBase
    {
        private ITimesOfPlay _repo;
        public TimesOfPlaysController(ITimesOfPlay repo)
        {
            _repo = repo;
        }

        [Authorize(Policy = "AdminRole")]
        [HttpPost("stadium/{id}/timeOfPlay")]
        public async Task<IActionResult> SaveTimeOfPlay([FromRoute] int id, SaveTimesOfPlayViewModel model)
        {
            try
            {
                await _repo.SaveTimeOfPlay(id, model); //add times for stadium


                return Ok(new { messageSucces = 1 });
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 33 }); // error while set time processing
            }
        }

    }
}
