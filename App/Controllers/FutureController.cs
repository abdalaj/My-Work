using Interfaces.Interfaces;
using Interfaces.ViewModels.StadiumVM;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace App.Controllers
{
    public class FutureController : Controller
    {
        private IFeature _repo;
        public FutureController(IFeature repo)
        {
            _repo = repo;
        }

        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Add()
        {
            var model = new SaveFutureViewModel();

            return View("FutureForm", model);
        }

        public async Task<IActionResult> Update(int id)
        {
            var model = await _repo.GetUpdatedFutrueById(id);

            return View("FutureForm", model);
        }

        [HttpPost]
        public async Task<IActionResult> Save(SaveFutureViewModel model)
        {
            try
            {
                if (!ModelState.IsValid)
                {
                    return View("FutureForm", model);
                }

                await _repo.SaveFuture(model);

                return RedirectToAction(nameof(Index));
            }
            catch (Exception e)
            {
                model.Error = "Error while Proccessing";
                return View("FutureForm", model);
            }
        }
    }
}
