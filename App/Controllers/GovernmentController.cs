using Interfaces.Interfaces;
using Interfaces.ViewModels.StadiumVM;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace App.Controllers
{
    public class GovernmentController : Controller
    {
        private IGovernment _repo;
        public GovernmentController(IGovernment repo)
        {
            _repo = repo;
        }

        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Add()
        {
            var model = new SaveGovernmentViewModel();

            return View("GovernmentForm", model);
        }

        public async Task<IActionResult> Update(int id)
        {
            var model = await _repo.GetUpdatedGovernmentById(id);

            return View("GovernmentForm", model);
        }

        [HttpPost]
        public async Task<IActionResult> Save(SaveGovernmentViewModel model)
        {
            try
            {
                if (!ModelState.IsValid)
                {
                    return View("GovernmentForm", model);
                }

                await _repo.SaveGovernment(model);

                return RedirectToAction(nameof(Index));
            }
            catch (Exception e)
            {
                model.Error = "Error while Proccessing";
                return View("GovernmentForm", model);
            }
        }
    }
}
