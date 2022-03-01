using Microsoft.EntityFrameworkCore.Migrations;

namespace App.Migrations
{
    public partial class AddReasonCanceledToReservation : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<string>(
                name: "Reason_canceled",
                table: "Reservation",
                type: "nvarchar(max)",
                nullable: true);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "Reason_canceled",
                table: "Reservation");
        }
    }
}
