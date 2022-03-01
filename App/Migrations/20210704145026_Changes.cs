using Microsoft.EntityFrameworkCore.Migrations;

namespace App.Migrations
{
    public partial class Changes : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_TimesOfplay_Stadium_Stadium_id",
                table: "TimesOfplay");

            migrationBuilder.DropPrimaryKey(
                name: "PK_TimesOfplay",
                table: "TimesOfplay");

            migrationBuilder.RenameTable(
                name: "TimesOfplay",
                newName: "TimesOfplays");

            migrationBuilder.RenameIndex(
                name: "IX_TimesOfplay_Stadium_id",
                table: "TimesOfplays",
                newName: "IX_TimesOfplays_Stadium_id");

            migrationBuilder.AddPrimaryKey(
                name: "PK_TimesOfplays",
                table: "TimesOfplays",
                column: "Id");

            migrationBuilder.AddForeignKey(
                name: "FK_TimesOfplays_Stadium_Stadium_id",
                table: "TimesOfplays",
                column: "Stadium_id",
                principalTable: "Stadium",
                principalColumn: "Id",
                onDelete: ReferentialAction.Cascade);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_TimesOfplays_Stadium_Stadium_id",
                table: "TimesOfplays");

            migrationBuilder.DropPrimaryKey(
                name: "PK_TimesOfplays",
                table: "TimesOfplays");

            migrationBuilder.RenameTable(
                name: "TimesOfplays",
                newName: "TimesOfplay");

            migrationBuilder.RenameIndex(
                name: "IX_TimesOfplays_Stadium_id",
                table: "TimesOfplay",
                newName: "IX_TimesOfplay_Stadium_id");

            migrationBuilder.AddPrimaryKey(
                name: "PK_TimesOfplay",
                table: "TimesOfplay",
                column: "Id");

            migrationBuilder.AddForeignKey(
                name: "FK_TimesOfplay_Stadium_Stadium_id",
                table: "TimesOfplay",
                column: "Stadium_id",
                principalTable: "Stadium",
                principalColumn: "Id",
                onDelete: ReferentialAction.Cascade);
        }
    }
}
