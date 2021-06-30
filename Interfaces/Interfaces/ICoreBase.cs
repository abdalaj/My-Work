using Interfaces.Base;
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
        string GenerateRandomCodeAsNumber();
    }
}
