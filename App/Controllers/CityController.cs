using Interfaces.Interfaces;
using Interfaces.ViewModels.StadiumVM;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace App.Controllers
{
    public class CityController : Controller
    {
        private ICity _repo;
        private IGovernment _repoGovernment;
        public CityController(ICity repo,
            IGovernment repoGovernment)
        {
            _repo = repo;
            _repoGovernment = repoGovernment;
        }

        public IActionResult Index()
        {
            return View();
        }

        public async Task<IActionResult> Add()
        {
            var model = new SaveCityViewModel {
                Government_drop_down_list = await _repoGovernment.GetGovernments()
            };

            return View("CityForm", model);
        }

        public async Task<IActionResult> Update(int id)
        {
            var model = await _repo.GetUpdatedCityById(id);

            return View("CityForm", model);
        }

        [HttpPost]
        public async Task<IActionResult> Save(SaveCityViewModel model)
        {
            try
            {
                if (!ModelState.IsValid)
                {
                    model = new SaveCityViewModel
                    {
                        Government_drop_down_list = await _repoGovernment.GetGovernments()
                    };

                    return View("CityForm", model);
                }

                if (model.Id == 0)
                {
                    if (await _repo.CheckCityExistBefore(model.Name_ar) || await _repo.CheckCityExistBefore(model.Name_en))
                    {
                        model = new SaveCityViewModel
                        {
                            Government_drop_down_list = await _repoGovernment.GetGovernments()
                        };

                        model.Error = "City already exist";
                        return View("CityForm", model);
                    }
                }

                await _repo.SaveCity(model);

                return RedirectToAction(nameof(Index));
            }
            catch (Exception e)
            {
                model.Error = "Error while Proccessing";
                return View("CityForm", model);
            }
        }
    }
}
