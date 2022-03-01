using Interfaces.Base;
using Microsoft.AspNetCore.Http;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfaces.Interfaces
{
    public interface ICoreBase : IService
    {
        Task<bool> SaveAll();
        void Add<T>(T entity) where T : class;
        void Delete<T>(T entity) where T : class;
        string GenerateRandomCodeAsNumber();
        bool SaveMultiImage(string root, List<string> imgs, out List<string> fileName);
        bool SaveSingleImage(string root, IFormFile img, out string fileName);
    }
}
