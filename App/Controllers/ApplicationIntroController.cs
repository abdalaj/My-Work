using Interfaces.Interfaces;
using Interfaces.ViewModels.IntroVM;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Threading.Tasks;

namespace App.Controllers
{
    public class ApplicationIntroController : Controller
    {
        private IApplicationIntro _repo;
        private IWebHostEnvironment _webHost;
        public ApplicationIntroController(IApplicationIntro repo,
            IWebHostEnvironment webHost)
        {
            _repo = repo;
            _webHost = webHost;
        }

        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Add()
        {
            var model = new SaveApplicationIntroViewModel();

            return View("IntroForm", model);
        }

        public async Task<IActionResult> Update(int id)
        {
            var model = await _repo.GetUpdatedIntroById(id);

            return View("IntroForm", model);
        }

        [HttpPost]
        public async Task<IActionResult> Save(SaveApplicationIntroViewModel model)
        {
            try
            {
                if (!ModelState.IsValid)
                {
                    model = new SaveApplicationIntroViewModel();

                    return View("IntroForm", model);
                }
                var root = Path.Combine(_webHost.WebRootPath , "upload");
                var result =  await _repo.SaveIntro(model, root);

                if (!string.IsNullOrEmpty(result))
                {
                    model.Error = result;
                    return View("IntroForm", model);
                }

                return RedirectToAction(nameof(Index));
            }
            catch (Exception e)
            {
                return View("IntroForm", model);
            }
        }
    }
}
