using Interfaces.Interfaces;
using Interfaces.ViewModels.UserVM;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.IdentityModel.Tokens.Jwt;
using System.Linq;
using System.Threading.Tasks;

namespace App.Controllers
{
    public class UserController : Controller
    {
        private IUser _repo;
        public UserController(IUser repo)
        {
            _repo = repo;
        }

        public IActionResult Login()
        {
            var model = new LoginViewModel();
            return View(model);
        }

        [HttpPost]
        public async Task<IActionResult> Login(LoginViewModel model)
        {
            if (string.IsNullOrEmpty(model.Name) || string.IsNullOrEmpty(model.Password))
            {
                model.Error = "check is name or password not empty";
                return View(model);
            }

            var result = await _repo.Login(model);

            if (result != null)
            {
                HttpContext.Session.SetString("JWToken", new JwtSecurityTokenHandler().WriteToken(result.Token));
                return RedirectToAction("Index", "Home");
            }

            model.Error = "name or password is wrong";
            return View(model);
        }

        [Authorize(Policy = "SuperAdminRole")]
        public IActionResult LogOut()
        {
            HttpContext.Session.Clear();

            return RedirectToAction(nameof(Login));
        }
    }
}
