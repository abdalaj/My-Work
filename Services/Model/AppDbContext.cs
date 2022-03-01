using Entites.Models;
using Microsoft.AspNetCore.Identity.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Services.Model
{
    public class AppDbContext : IdentityDbContext<Users>
    {
        public AppDbContext(DbContextOptions<AppDbContext> options) 
            : base (options)
        {

        }

        public DbSet<Users> User { get; set; }
        public DbSet<Features> Features { get; set; }
        public DbSet<FeaturesOfStadium> FeaturesOfStadium { get; set; }
        public DbSet<Government> Governments { get; set; }
        public DbSet<City> City { get; set; }
        public DbSet<Stadium> Stadium { get; set; }
        public DbSet<StadiumImage> StadiumImages { get; set; }
        public DbSet<ConfirmCode> ConfirmCode { get; set; }
        public DbSet<TimesOfplay> TimesOfplays { get; set; }
        public DbSet<Reservation> Reservation { get; set; }
        public DbSet<ReservationStatus> ReservationStatuses { get; set; }
        public DbSet<Contact> Contacts { get; set; }
        public DbSet<ReasonsCancel> ReasonsCancels { get; set; }
        public DbSet<ApplicationIntro> ApplicationIntro { get; set; }
        public DbSet<Rate> Ratings { get; set; }

        protected override void OnModelCreating(ModelBuilder builder)
        {
            base.OnModelCreating(builder);

            builder.Entity<ReservationStatus>().HasData(
                new ReservationStatus { Id = 1, State = "Pending" },
                new ReservationStatus { Id = 2, State = "Canceled" },
                new ReservationStatus { Id = 3, State = "Finished" });

            builder.Entity<FeaturesOfStadium>()
                .HasKey(b => new { b.Stadium_id , b.Feature_id});

            builder.Entity<FeaturesOfStadium>()
                .HasOne<Stadium>(x => x.Stadium)
                .WithMany(x => x.Features_of_stadium)
                .HasForeignKey(x => x.Stadium_id);

            builder.Entity<FeaturesOfStadium>()
                .HasOne<Features>(x => x.Feature)
                .WithMany(x => x.Features_of_stadium)
                .HasForeignKey(x => x.Feature_id);

            builder.Entity<Rate>().HasKey(r => new { r.Stadium_id, r.User_id });

            builder.Entity<Rate>
                ().HasOne<Users>(x => x.Users)
                .WithMany(x => x.Ratings)
                .HasForeignKey(x => x.User_id);

            builder.Entity<Rate>()
                .HasOne<Stadium>(s => s.Stadium)
                .WithMany(s => s.Ratings).
                HasForeignKey(s => s.Stadium_id);

            builder.Entity<ConfirmCode>().HasIndex(c => new { c.Phone }).IsUnique();
        }
    }
}
