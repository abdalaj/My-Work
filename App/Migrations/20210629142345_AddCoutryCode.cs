using Microsoft.EntityFrameworkCore.Migrations;

namespace App.Migrations
{
    public partial class AddCoutryCode : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<string>(
                name: "Country_code",
                table: "ConfirmCode",
                type: "nvarchar(max)",
                nullable: true);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "Country_code",
                table: "ConfirmCode");
        }
    }
}
