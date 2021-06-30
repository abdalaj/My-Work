using Interfaces.Interfaces;
using Services.Base;
using Services.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Services.Services
{
    public class CoreBaseService : BaseService, ICoreBase
    {
        private AppDbContext _context;
        public CoreBaseService(AppDbContext context)
        {
            _context = context;
        }

        public void Add<T>(T entity) where T : class
        {
            _context.Add(entity);
        }

        public string GenerateRandomCodeAsNumber()
        {
            Random rnd = new Random();
            int _min = 1000;
            int _max = 9999;
            int month = rnd.Next(_min, _max);

            return month.ToString();
        }

        public async Task<bool> SaveAll()
        {
            return await _context.SaveChangesAsync() > 0;
        }
    }
}
