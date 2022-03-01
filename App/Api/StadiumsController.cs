using Interfaces.Helper;
using Interfaces.Interfaces;
using Interfaces.ViewModels.RatingVM;
using Interfaces.ViewModels.ReservationVM;
using Interfaces.ViewModels.StadiumVM;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Globalization;
using System.IO;
using System.Linq;
using System.Security.Claims;
using System.Threading.Tasks;

namespace App.Api
{
    [Route("api/[controller]")]
    [ApiController]
    public class StadiumsController : ControllerBase
    {
        private IStadium _repo;
        private IFeature _repoFeature;
        private IReservation _repoReservation;
        private IRating _repoRating;
        private ICoreBase _repoCore;
        private IWebHostEnvironment _webHost;
        public StadiumsController(IStadium repo,
            ICoreBase repoCore,
            IFeature repoFeature,
            IRating repoRating,
            IReservation repoReservation,
            IWebHostEnvironment webHost)
        {
            _repo = repo;
            _repoFeature = repoFeature;
            _repoRating = repoRating;
            _repoCore = repoCore;
            _repoReservation = repoReservation;
            _webHost = webHost;
        }

        [Authorize(Policy = "AdminRole")]
        [HttpGet("{id}/details")]
        public async Task<IActionResult> StadiumDetails([FromRoute] int id,[FromQuery] UserParam param)
        {
            var current_authenticated_id = User.FindFirst(ClaimTypes.NameIdentifier).Value;

            if (!await _repo.IsStadiumExist(id))
            {
                return BadRequest(new { messageError = 43 }); // there is no stadium has this id
            }

            if (!await _repo.IsYouStadiumsOwner(current_authenticated_id, id))
            {
                return BadRequest(new { messageError = 44 }); // you can't access on this stadium you aren't stadium owner
            }

            var result = await _repo.GetStadiumDetailsById(id, param);

            return Ok(result);
        }

        [Authorize(Policy = "AdminRole")]
        [HttpGet("{id}/details-for-update")]
        public async Task<IActionResult> StadiumDetailsForUpdate([FromRoute] int id, [FromQuery] UserParam param)
        {
            var current_authenticated_id = User.FindFirst(ClaimTypes.NameIdentifier).Value;

            if (!await _repo.IsStadiumExist(id))
            {
                return BadRequest(new { messageError = 43 }); // there is no stadium has this id
            }

            if (!await _repo.IsYouStadiumsOwner(current_authenticated_id, id))
            {
                return BadRequest(new { messageError = 44 }); // you can't access on this stadium you aren't stadium owner
            }

            var result = await _repo.GetStadiumDetailsForUpdateById(id);

            return Ok(result);
        }

        [Authorize(Policy = "AdminRole")]
        [HttpPost]
        public async Task<IActionResult> CreateStadium(SaveStadiumViewModel model)
        {
            try
            {
                if (string.IsNullOrEmpty(model.Name_ar))
                {
                    return BadRequest(new { messageError = 19 }); // name arabic must be fill
                }

                if (string.IsNullOrEmpty(model.Name_en))
                {
                    return BadRequest(new { messageError = 20 }); // name english must be fill
                }

                if (model.City_id == 0)
                {
                    return BadRequest(new { messageError = 22 }); // city must be selected
                }

                if (string.IsNullOrEmpty(model.Address))
                {
                    return BadRequest(new { messageError = 23 }); // address must be fill
                }

                if (model.Latitude == 0)
                {
                    return BadRequest(new { messageError = 24 }); // lat must be fill
                }

                decimal lat;
                if (decimal.TryParse(model.Latitude.ToString(), out lat))
                {
                    return BadRequest(new { messageError = 45 }); // lat format decimal not valid
                }


                decimal lan;
                if (decimal.TryParse(model.Longtiude.ToString(), out lan))
                {
                    return BadRequest(new { messageError = 46 }); // long format decimal not valid
                }

                if (model.Longtiude == 0)
                {
                    return BadRequest(new { messageError = 25 }); // long must be fill
                }

                if (model.Price_per_hour == 0)
                {
                    return BadRequest(new { messageError = 26 }); // price must be fill
                }

                if (string.IsNullOrEmpty(model.Description))
                {
                    return BadRequest(new { messageError = 27 }); // description must be fill
                }

                model.User_id = User.FindFirst(ClaimTypes.NameIdentifier).Value;
                var result = await _repo.SaveStadium(model);

                if (result == null)
                {
                    return BadRequest(new { messageError = 17 }); // faild create stadium
                }

                return Ok(new { messageSuccess = 1 , stadiumId = result.Id});
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 18 }); // error while creating stadium
            }
        }

        [Authorize(Policy = "AdminRole")]
        [HttpPost("{id}/add-images-and-features")]
        public async Task<IActionResult> AddFuturesAndImagesToStadium([FromRoute] int id, SaveImagesAndFuturesToStadiumViewModel model)
        {
            try
            {
                var current_authenticated_id = User.FindFirst(ClaimTypes.NameIdentifier).Value;

                if (!await _repo.IsStadiumExist(id))
                {
                    return BadRequest(new { messageError = 43 }); // there is no stadium has this id
                }

                if (!await _repo.IsYouStadiumsOwner(current_authenticated_id, id))
                {
                    return BadRequest(new { messageError = 44 }); // you can't access on this stadium you aren't stadium owner
                }

                if (model.Images == null)
                {
                    return BadRequest(new { messageError = 28 }); // images must have uplade
                }

                if (model.Futures == null)
                {
                    return BadRequest(new { messageError = 29 }); // futures must be fill
                }

                if (!await _repoFeature.IsFeatureExist(model.Futures))
                {
                    return BadRequest(new { messageError =  42 }); // futures doesn't exist
                }

                if (await _repo.IsStadiumHasTheseFeatures(model.Futures, id))
                {
                    return BadRequest(new { messageError = 45 }); // futures exist for this stadium
                }

                if (!await _repo.IsStadiumExist(id))
                {
                    return BadRequest(new { messageError = 43 }); // there is no stadium has this id
                }

                await _repo.SaveStadiumFutures(id, model.Futures, false);


                var fileName = new List<string>();
                var root = Path.Combine(_webHost.WebRootPath, "upload");

                var upload = _repoCore.SaveMultiImage(root, model.Images, out fileName);

                if (!upload)
                {
                    return BadRequest(new { messageError = 30 }); // upload failed
                }

                await _repo.SaveStadiumImages(id, fileName , false, root);
                
                return Ok(new { messageSuccess = 1 });
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 31 }); // error while adding futures or images
            }
        }

        [Authorize(Policy = "AdminRole")]
        [HttpGet("{id}/get-images-and-features")]
        public async Task<IActionResult> GetImagesAndFeaturesForStadium([FromRoute] int id)
        {
            var current_authenticated_id = User.FindFirst(ClaimTypes.NameIdentifier).Value;

            if (!await _repo.IsStadiumExist(id))
            {
                return BadRequest(new { messageError = 43 }); // there is no stadium has this id
            }

            if (!await _repo.IsYouStadiumsOwner(current_authenticated_id, id))
            {
                return BadRequest(new { messageError = 44 }); // you can't access on this stadium you aren't stadium owner
            }

            var result = await _repo.GetUpdateStadiumsAndFeaturesById(id);

            return Ok(result);
        }

        [Authorize(Policy = "AdminRole")]
        [HttpPut("{id}/update-images-and-features")]
        public async Task<IActionResult> UpdateFuturesAndImagesToStadium([FromRoute] int id, SaveImagesAndFuturesToStadiumViewModel model)
        {
            try
            {
                var current_authenticated_id = User.FindFirst(ClaimTypes.NameIdentifier).Value;

                if (!await _repo.IsStadiumExist(id))
                {
                    return BadRequest(new { messageError = 43 }); // there is no stadium has this id
                }

                if (!await _repo.IsYouStadiumsOwner(current_authenticated_id, id))
                {
                    return BadRequest(new { messageError = 44 }); // you can't access on this stadium you aren't stadium owner
                }

                if (model.Images != null)
                {
                    var fileName = new List<string>();
                    var root = Path.Combine(_webHost.WebRootPath, "upload");

                    var upload = _repoCore.SaveMultiImage(root, model.Images, out fileName);

                    if (!upload)
                    {
                        return BadRequest(new { messageError = 30 }); // upload failed
                    }

                    await _repo.SaveStadiumImages(id, fileName, true, root);
                    
                }

                if (model.Futures != null)
                {
                    await _repo.SaveStadiumFutures(id, model.Futures, true);
                }

                if (!await _repoFeature.IsFeatureExist(model.Futures))
                {
                    return BadRequest(new { messageError = 42 }); // futures doesn't exist
                }

                return Ok(new { messageSuccess = 1 });
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 31 }); // error while adding futures or images
            }
        }

        [Authorize(Policy = "AdminRole")]
        [HttpGet("stadiums/forAdmin")]
        public async Task<IActionResult> GetStadiumsForAdmin([FromQuery] UserParam param)
        {
            var id = User.FindFirst(ClaimTypes.NameIdentifier).Value;

            var result = await _repo.GetStadiumsForAdminById(id, param);

            return Ok(result);
        }

        [Authorize(Policy = "AdminRole")]
        [HttpPut("{id}")]
        public async Task<IActionResult> UpdateStadium([FromRoute] int id, SaveStadiumViewModel model)
        {
            try
            {
                var current_authenticated_id = User.FindFirst(ClaimTypes.NameIdentifier).Value;

                if (!await _repo.IsStadiumExist(id))
                {
                    return BadRequest(new { messageError = 43 }); // there is no stadium has this id
                }

                if (!await _repo.IsYouStadiumsOwner(current_authenticated_id, id))
                {
                    return BadRequest(new { messageError = 44 }); // you can't access on this stadium you aren't stadium owner
                }

                model.Id = id;
                var result = await _repo.SaveStadium(model);

                if (result == null)
                {
                    return BadRequest(new { messageError = 34 }); // update failed
                }

                return Ok(new { messageSuccess = 1 });
            }
            catch(Exception e)
            {
                return BadRequest(new { messageError = 35 }); // error while updating
            }
        }

        [Authorize(Policy = "UserRole")]
        [HttpGet("{id}/get-available-times")]
        public async Task<IActionResult> GetAvaliableTimes([FromRoute] int id, [FromQuery] UserParam param)
        {
            if (!await _repo.IsStadiumExist(id))
            {
                return BadRequest(new { messageError = 43 }); // there is no stadium has this id
            }

            var times = await _repo.GetStadiumTimesOfPlay(id, param);

            return Ok(times);
        }

        [Authorize]
        [HttpPut("{id}/reservation/{reservation_id}/cancel")]
        public async Task<IActionResult> CancelReservation([FromRoute] int id, [FromRoute] int reservation_id)
        {
            var current_authenticated_id = User.FindFirst(ClaimTypes.NameIdentifier).Value;

            if (!await _repo.IsStadiumExist(id))
            {
                return BadRequest(new { messageError = 43 }); // there is no stadium has this id
            }

            if (User.FindFirst(ClaimTypes.Role).Value == "Admin")
            {
                if (!await _repo.IsYouStadiumsOwner(current_authenticated_id, id))
                {
                    return BadRequest(new { messageError = 44 }); // you can't access on this stadium you aren't stadium owner
                }
            }
            else
            {
                if (!await _repoReservation.IsYourReservationsOwner(current_authenticated_id, reservation_id))
                {
                    return BadRequest(new { messageError = 49 });
                }
            }

            if (!await _repo.IsStadiumExist(id))
            {
                return BadRequest(new { messageError = 43 }); // there is no stadium has this id
            }

            var result = await _repoReservation.CancelResevation(reservation_id);

            if (!result)
            {
                return BadRequest(new { messageError = 48 }); // cancel failed
            }

            return Ok(new { messageSuccess = 1 });
        }

        [Authorize(Policy = "UserRole")]
        [HttpPost("{id}/make-reservation")]
        public async Task<IActionResult> MakeReservation([FromRoute]int id, MakeReservationViewModel model)
        {
            try
            {
                if (!await _repo.IsStadiumExist(id))
                {
                    return BadRequest(new { messageError = 43 }); // there is no stadium has this id
                }

                var current_authentcated_user_id = User.FindFirst(ClaimTypes.NameIdentifier).Value;

                if (await _repoReservation.CheckIfReservationExistForThisStadium(current_authentcated_user_id, id))
                {
                    return BadRequest(new { messageError = 53 }); // you have already reservation for this stadium
                }

                DateTime dt;
                if (!DateTime.TryParseExact(
                     model.Date,
                     "M/d/yyyy",
                     CultureInfo.InvariantCulture,
                     DateTimeStyles.None,
                     out dt))
                {
                    return BadRequest(new { messageError = 47 }); // date is non valid format
                }

                model.User_id = User.FindFirst(ClaimTypes.NameIdentifier).Value;
                var result = await _repoReservation.MakeReservation(id, model);

                if (!result)
                {
                    return BadRequest(new { messageError = 36 }); //faild reservation
                }

                return Ok(new { messageSuccess = 1 });
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 48 }); // error while reservation proccess
            }
        }

        [Authorize(Policy = "UserRole")]
        [HttpGet("get-user-reservations")]
        public async Task<IActionResult> GetResevationsForUser([FromQuery] UserParam param)
        {
            var id = User.FindFirst(ClaimTypes.NameIdentifier).Value;
            var root = Path.Combine(_webHost.WebRootPath, "/upload/");

            var reservations = await _repoReservation.GetReservationsForUserById(id, param, root);

            return Ok(reservations);
        }

        [Authorize(Policy = "AdminRole")]
        [HttpGet("get-admin-reservations")]
        public async Task<IActionResult> GetResevationsForAdmin()
        {
            var id = User.FindFirst(ClaimTypes.NameIdentifier).Value;
            var root = Path.Combine(_webHost.WebRootPath, "/upload/");

            var reservations = await _repoReservation.GetReservationsForAdminById(id, root);

            return Ok(reservations);
        }

        [Authorize(Policy = "AdminRole")]
        [HttpGet("get-admin-reservations-canceled")]
        public async Task<IActionResult> GetResevationsCanceledForAdmin()
        {
            var id = User.FindFirst(ClaimTypes.NameIdentifier).Value;
            var root = Path.Combine(_webHost.WebRootPath, "/upload/");

            var reservationsCanceled = await _repoReservation.GetCanceledReservationForAdminById(id, root);

            return Ok(reservationsCanceled);
        }

        [Authorize]
        [HttpGet("reservation/{id}/details")]
        public async Task<IActionResult> GetReservationDetails([FromRoute] int id, [FromQuery] UserParam param)
        {
            var details = await _repoReservation.GetReservationDetails(id, param);

            return Ok(details);
        }

        [Authorize(Policy = "AdminRole")]
        [HttpGet("get-admins-stadium")]
        public async Task<IActionResult> GetAdminsStadium([FromQuery] UserParam param)
        {
            var id = User.FindFirst(ClaimTypes.NameIdentifier).Value;
            var root = Path.Combine(_webHost.WebRootPath, "/upload/");

            var stadiums = await _repo.GetAdminsStadiumById(id, param, root);

            return Ok(stadiums);
        }

        [Authorize(Policy = "UserRole")]
        [HttpPost("reservation/{id}/reasonCanceled")]
        public async Task<IActionResult> SetReasoneCanceled([FromRoute] int id,[FromBody] SetReasonViewModel model)
        {
            try
            {
                var result = await _repoReservation.SetReasonCanceled(id, model);

                if (!result)
                {
                    return BadRequest(new { messageError = 37 }); // failed set reason cancel
                }

                return Ok(new { messageSuccess = 1 });
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 38 }); // error while set reason proccess 
            }
        }

        [Authorize(Policy = "UserRole")]
        [HttpPost("{id}/rate")]
        public async Task<IActionResult> SaveUserRating(SaveRatingViewModel model, int id)
        {
            try
            {
                var user_id = User.FindFirst(ClaimTypes.NameIdentifier).Value;

                if (!await _repo.IsStadiumExist(id))
                {
                    return BadRequest(new { messageError = 43 }); // there is no stadium has this id
                }

                if (await _repoRating.CheckIfUserRatedStadium(user_id, id))
                {
                    return BadRequest(new { messageError = 54 }); // you have rated this stadium before
                }

                if (model.Rating > 5)
                {
                    return BadRequest(new { messageError = 52 }); // maximum rate is 5
                }

                model.Stadium_id = id;
                model.User_id = user_id;

                var result = await _repoRating.SaveRating(model);

                if (!result)
                {
                    return BadRequest(new { messageError = 50 }); // failed rating
                }

                return Ok(new { messageSuccess = 1 });
            }
            catch (Exception e)
            {
                return BadRequest(new { messageError = 51 }); // error while rating proccess
            }
        }
    }
}
