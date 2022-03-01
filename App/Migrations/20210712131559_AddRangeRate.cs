using Microsoft.EntityFrameworkCore.Migrations;

namespace App.Migrations
{
    public partial class AddRangeRate : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.RenameColumn(
                name: "Rate",
                table: "Ratings",
                newName: "Rating");
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.RenameColumn(
                name: "Rating",
                table: "Ratings",
                newName: "Rate");
        }
    }
}
