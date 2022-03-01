using Microsoft.EntityFrameworkCore.Migrations;

namespace App.Migrations
{
    public partial class EditIntroFields : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.RenameColumn(
                name: "Data_en",
                table: "Intro",
                newName: "Description_en");

            migrationBuilder.RenameColumn(
                name: "Data_ar",
                table: "Intro",
                newName: "Description_ar");
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.RenameColumn(
                name: "Description_en",
                table: "Intro",
                newName: "Data_en");

            migrationBuilder.RenameColumn(
                name: "Description_ar",
                table: "Intro",
                newName: "Data_ar");
        }
    }
}
