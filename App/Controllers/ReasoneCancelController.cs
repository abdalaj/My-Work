using Interfaces.Interfaces;
using Interfaces.ViewModels.ReasoneVM;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace App.Controllers
{
    public class ReasoneCancelController : Controller
    {
        private IReasone _repo;
        public ReasoneCancelController(IReasone repo)
        {
            _repo = repo;
        }

        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Add()
        {
            var model = new SaveReasoneViewModel();

            return View("ReasoneForm", model);
        }

        public async Task<IActionResult> Update(int id)
        {
            var model = await _repo.GetUpdatedReasoneById(id);

            return View("ReasoneForm", model);
        }

        [HttpPost]
        public async Task<IActionResult> Save(SaveReasoneViewModel model)
        {
            try
            {
                if (!ModelState.IsValid)
                {
                    model = new SaveReasoneViewModel();

                    return View("ReasoneForm", model);
                }

                await _repo.SaveReasone(model);

                return RedirectToAction(nameof(Index));
            }
            catch (Exception e)
            {
                return View("ReasoneForm", model);
            }
        }
    }
}
