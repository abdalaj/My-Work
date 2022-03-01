using Microsoft.EntityFrameworkCore.Migrations;

namespace App.Migrations
{
    public partial class EditNameIntro : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "Intro");

            migrationBuilder.CreateTable(
                name: "ApplicationIntro",
                columns: table => new
                {
                    Id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("SqlServer:Identity", "1, 1"),
                    Description_en = table.Column<string>(type: "nvarchar(max)", nullable: false),
                    Description_ar = table.Column<string>(type: "nvarchar(max)", nullable: false),
                    Image = table.Column<string>(type: "nvarchar(max)", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_ApplicationIntro", x => x.Id);
                });
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "ApplicationIntro");

            migrationBuilder.CreateTable(
                name: "Intro",
                columns: table => new
                {
                    Id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("SqlServer:Identity", "1, 1"),
                    Description_ar = table.Column<string>(type: "nvarchar(max)", nullable: false),
                    Description_en = table.Column<string>(type: "nvarchar(max)", nullable: false),
                    Image = table.Column<string>(type: "nvarchar(max)", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Intro", x => x.Id);
                });
        }
    }
}
