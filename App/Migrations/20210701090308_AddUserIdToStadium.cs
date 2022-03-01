using Microsoft.EntityFrameworkCore.Migrations;

namespace App.Migrations
{
    public partial class AddUserIdToStadium : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<string>(
                name: "User_id",
                table: "Stadium",
                type: "nvarchar(450)",
                nullable: true);

            migrationBuilder.CreateIndex(
                name: "IX_Stadium_User_id",
                table: "Stadium",
                column: "User_id");

            migrationBuilder.AddForeignKey(
                name: "FK_Stadium_AspNetUsers_User_id",
                table: "Stadium",
                column: "User_id",
                principalTable: "AspNetUsers",
                principalColumn: "Id",
                onDelete: ReferentialAction.Restrict);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_Stadium_AspNetUsers_User_id",
                table: "Stadium");

            migrationBuilder.DropIndex(
                name: "IX_Stadium_User_id",
                table: "Stadium");

            migrationBuilder.DropColumn(
                name: "User_id",
                table: "Stadium");
        }
    }
}
