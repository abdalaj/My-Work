using Microsoft.EntityFrameworkCore.Migrations;

namespace App.Migrations
{
    public partial class AddGovernmentIdToCity : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_Stadium_Governments_Government_id",
                table: "Stadium");

            migrationBuilder.DropIndex(
                name: "IX_Stadium_Government_id",
                table: "Stadium");

            migrationBuilder.DropColumn(
                name: "Government_id",
                table: "Stadium");

            migrationBuilder.AddColumn<int>(
                name: "Government_id",
                table: "City",
                type: "int",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.CreateIndex(
                name: "IX_City_Government_id",
                table: "City",
                column: "Government_id");

            migrationBuilder.AddForeignKey(
                name: "FK_City_Governments_Government_id",
                table: "City",
                column: "Government_id",
                principalTable: "Governments",
                principalColumn: "Id",
                onDelete: ReferentialAction.Cascade);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_City_Governments_Government_id",
                table: "City");

            migrationBuilder.DropIndex(
                name: "IX_City_Government_id",
                table: "City");

            migrationBuilder.DropColumn(
                name: "Government_id",
                table: "City");

            migrationBuilder.AddColumn<int>(
                name: "Government_id",
                table: "Stadium",
                type: "int",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.CreateIndex(
                name: "IX_Stadium_Government_id",
                table: "Stadium",
                column: "Government_id");

            migrationBuilder.AddForeignKey(
                name: "FK_Stadium_Governments_Government_id",
                table: "Stadium",
                column: "Government_id",
                principalTable: "Governments",
                principalColumn: "Id",
                onDelete: ReferentialAction.Cascade);
        }
    }
}
