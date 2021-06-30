using Microsoft.EntityFrameworkCore.Migrations;

namespace App.Migrations
{
    public partial class AddCodeToUser : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<int>(
                name: "Confirm_code",
                table: "AspNetUsers",
                type: "int",
                nullable: false,
                defaultValue: 0);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "Confirm_code",
                table: "AspNetUsers");
        }
    }
}
