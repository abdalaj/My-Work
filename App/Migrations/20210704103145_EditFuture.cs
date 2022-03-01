using Microsoft.EntityFrameworkCore.Migrations;

namespace App.Migrations
{
    public partial class EditFuture : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.RenameColumn(
                name: "Feature",
                table: "Features",
                newName: "Name_er");

            migrationBuilder.AddColumn<string>(
                name: "Name_ar",
                table: "Features",
                type: "nvarchar(max)",
                nullable: true);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "Name_ar",
                table: "Features");

            migrationBuilder.RenameColumn(
                name: "Name_er",
                table: "Features",
                newName: "Feature");
        }
    }
}
