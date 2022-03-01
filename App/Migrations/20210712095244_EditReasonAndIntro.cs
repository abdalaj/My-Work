using Microsoft.EntityFrameworkCore.Migrations;

namespace App.Migrations
{
    public partial class EditReasonAndIntro : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.RenameColumn(
                name: "Reason",
                table: "ReasonsCancels",
                newName: "Reason_en");

            migrationBuilder.RenameColumn(
                name: "Data",
                table: "Intro",
                newName: "Data_en");

            migrationBuilder.AddColumn<string>(
                name: "Reason_ar",
                table: "ReasonsCancels",
                type: "nvarchar(max)",
                nullable: false,
                defaultValue: "");

            migrationBuilder.AddColumn<string>(
                name: "Data_ar",
                table: "Intro",
                type: "nvarchar(max)",
                nullable: false,
                defaultValue: "");
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "Reason_ar",
                table: "ReasonsCancels");

            migrationBuilder.DropColumn(
                name: "Data_ar",
                table: "Intro");

            migrationBuilder.RenameColumn(
                name: "Reason_en",
                table: "ReasonsCancels",
                newName: "Reason");

            migrationBuilder.RenameColumn(
                name: "Data_en",
                table: "Intro",
                newName: "Data");
        }
    }
}
