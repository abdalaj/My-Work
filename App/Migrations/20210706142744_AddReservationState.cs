using Microsoft.EntityFrameworkCore.Migrations;

namespace App.Migrations
{
    public partial class AddReservationState : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<int>(
                name: "Reservation_state_id",
                table: "Reservations",
                type: "int",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.CreateTable(
                name: "ReservationStatuses",
                columns: table => new
                {
                    Id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("SqlServer:Identity", "1, 1"),
                    Status = table.Column<string>(type: "nvarchar(max)", nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_ReservationStatuses", x => x.Id);
                });

            migrationBuilder.CreateIndex(
                name: "IX_Reservations_Reservation_state_id",
                table: "Reservations",
                column: "Reservation_state_id");

            migrationBuilder.AddForeignKey(
                name: "FK_Reservations_ReservationStatuses_Reservation_state_id",
                table: "Reservations",
                column: "Reservation_state_id",
                principalTable: "ReservationStatuses",
                principalColumn: "Id",
                onDelete: ReferentialAction.Cascade);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_Reservations_ReservationStatuses_Reservation_state_id",
                table: "Reservations");

            migrationBuilder.DropTable(
                name: "ReservationStatuses");

            migrationBuilder.DropIndex(
                name: "IX_Reservations_Reservation_state_id",
                table: "Reservations");

            migrationBuilder.DropColumn(
                name: "Reservation_state_id",
                table: "Reservations");
        }
    }
}
