using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace App.Migrations
{
    public partial class AddReservationAndStatus : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_Reservation_AspNetUsers_User_id",
                table: "Reservation");

            migrationBuilder.DropForeignKey(
                name: "FK_Reservation_ReservationStatus_Reservation_state_id",
                table: "Reservation");

            migrationBuilder.DropForeignKey(
                name: "FK_Reservation_Stadium_Stadium_id",
                table: "Reservation");

            migrationBuilder.DropUniqueConstraint(
                name: "AK_ReservationStatus_TempId",
                table: "ReservationStatus");

            migrationBuilder.RenameTable(
                name: "ReservationStatus",
                newName: "ReservationStatuses");

            migrationBuilder.RenameTable(
                name: "Reservation",
                newName: "Reservations");

            migrationBuilder.RenameColumn(
                name: "TempId",
                table: "ReservationStatuses",
                newName: "Id");

            migrationBuilder.AlterColumn<int>(
                name: "Id",
                table: "ReservationStatuses",
                type: "int",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "int")
                .Annotation("SqlServer:Identity", "1, 1");

            migrationBuilder.AddColumn<string>(
                name: "Status",
                table: "ReservationStatuses",
                type: "nvarchar(max)",
                nullable: true);

            migrationBuilder.AlterColumn<int>(
                name: "Stadium_id",
                table: "Reservations",
                type: "int",
                nullable: false,
                defaultValue: 0,
                oldClrType: typeof(int),
                oldType: "int",
                oldNullable: true);

            migrationBuilder.AlterColumn<int>(
                name: "Reservation_state_id",
                table: "Reservations",
                type: "int",
                nullable: false,
                defaultValue: 0,
                oldClrType: typeof(int),
                oldType: "int",
                oldNullable: true);

            migrationBuilder.AddColumn<int>(
                name: "Id",
                table: "Reservations",
                type: "int",
                nullable: false,
                defaultValue: 0)
                .Annotation("SqlServer:Identity", "1, 1");

            migrationBuilder.AddColumn<DateTime>(
                name: "Date",
                table: "Reservations",
                type: "datetime2",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<string>(
                name: "Time",
                table: "Reservations",
                type: "nvarchar(max)",
                nullable: true);

            migrationBuilder.AddPrimaryKey(
                name: "PK_ReservationStatuses",
                table: "ReservationStatuses",
                column: "Id");

            migrationBuilder.AddPrimaryKey(
                name: "PK_Reservations",
                table: "Reservations",
                column: "Id");

            migrationBuilder.InsertData(
                table: "ReservationStatuses",
                columns: new[] { "Id", "Status" },
                values: new object[] { 1, "Pending" });

            migrationBuilder.InsertData(
                table: "ReservationStatuses",
                columns: new[] { "Id", "Status" },
                values: new object[] { 2, "Canceled" });

            migrationBuilder.InsertData(
                table: "ReservationStatuses",
                columns: new[] { "Id", "Status" },
                values: new object[] { 3, "Finished" });

            migrationBuilder.CreateIndex(
                name: "IX_Reservations_Reservation_state_id",
                table: "Reservations",
                column: "Reservation_state_id");

            migrationBuilder.CreateIndex(
                name: "IX_Reservations_Stadium_id",
                table: "Reservations",
                column: "Stadium_id");

            migrationBuilder.CreateIndex(
                name: "IX_Reservations_User_id",
                table: "Reservations",
                column: "User_id");

            migrationBuilder.AddForeignKey(
                name: "FK_Reservations_AspNetUsers_User_id",
                table: "Reservations",
                column: "User_id",
                principalTable: "AspNetUsers",
                principalColumn: "Id",
                onDelete: ReferentialAction.Restrict);

            migrationBuilder.AddForeignKey(
                name: "FK_Reservations_ReservationStatuses_Reservation_state_id",
                table: "Reservations",
                column: "Reservation_state_id",
                principalTable: "ReservationStatuses",
                principalColumn: "Id",
                onDelete: ReferentialAction.Cascade);

            migrationBuilder.AddForeignKey(
                name: "FK_Reservations_Stadium_Stadium_id",
                table: "Reservations",
                column: "Stadium_id",
                principalTable: "Stadium",
                principalColumn: "Id",
                onDelete: ReferentialAction.Cascade);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_Reservations_AspNetUsers_User_id",
                table: "Reservations");

            migrationBuilder.DropForeignKey(
                name: "FK_Reservations_ReservationStatuses_Reservation_state_id",
                table: "Reservations");

            migrationBuilder.DropForeignKey(
                name: "FK_Reservations_Stadium_Stadium_id",
                table: "Reservations");

            migrationBuilder.DropPrimaryKey(
                name: "PK_ReservationStatuses",
                table: "ReservationStatuses");

            migrationBuilder.DropPrimaryKey(
                name: "PK_Reservations",
                table: "Reservations");

            migrationBuilder.DropIndex(
                name: "IX_Reservations_Reservation_state_id",
                table: "Reservations");

            migrationBuilder.DropIndex(
                name: "IX_Reservations_Stadium_id",
                table: "Reservations");

            migrationBuilder.DropIndex(
                name: "IX_Reservations_User_id",
                table: "Reservations");

            migrationBuilder.DeleteData(
                table: "ReservationStatuses",
                keyColumn: "Id",
                keyValue: 1);

            migrationBuilder.DeleteData(
                table: "ReservationStatuses",
                keyColumn: "Id",
                keyValue: 2);

            migrationBuilder.DeleteData(
                table: "ReservationStatuses",
                keyColumn: "Id",
                keyValue: 3);

            migrationBuilder.DropColumn(
                name: "Status",
                table: "ReservationStatuses");

            migrationBuilder.DropColumn(
                name: "Id",
                table: "Reservations");

            migrationBuilder.DropColumn(
                name: "Date",
                table: "Reservations");

            migrationBuilder.DropColumn(
                name: "Time",
                table: "Reservations");

            migrationBuilder.RenameTable(
                name: "ReservationStatuses",
                newName: "ReservationStatus");

            migrationBuilder.RenameTable(
                name: "Reservations",
                newName: "Reservation");

            migrationBuilder.RenameColumn(
                name: "Id",
                table: "ReservationStatus",
                newName: "TempId");

            migrationBuilder.AlterColumn<int>(
                name: "TempId",
                table: "ReservationStatus",
                type: "int",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "int")
                .OldAnnotation("SqlServer:Identity", "1, 1");

            migrationBuilder.AlterColumn<int>(
                name: "Stadium_id",
                table: "Reservation",
                type: "int",
                nullable: true,
                oldClrType: typeof(int),
                oldType: "int");

            migrationBuilder.AlterColumn<int>(
                name: "Reservation_state_id",
                table: "Reservation",
                type: "int",
                nullable: true,
                oldClrType: typeof(int),
                oldType: "int");

            migrationBuilder.AddUniqueConstraint(
                name: "AK_ReservationStatus_TempId",
                table: "ReservationStatus",
                column: "TempId");

            migrationBuilder.AddForeignKey(
                name: "FK_Reservation_AspNetUsers_User_id",
                table: "Reservation",
                column: "User_id",
                principalTable: "AspNetUsers",
                principalColumn: "Id",
                onDelete: ReferentialAction.Restrict);

            migrationBuilder.AddForeignKey(
                name: "FK_Reservation_ReservationStatus_Reservation_state_id",
                table: "Reservation",
                column: "Reservation_state_id",
                principalTable: "ReservationStatus",
                principalColumn: "TempId",
                onDelete: ReferentialAction.Cascade);

            migrationBuilder.AddForeignKey(
                name: "FK_Reservation_Stadium_Stadium_id",
                table: "Reservation",
                column: "Stadium_id",
                principalTable: "Stadium",
                principalColumn: "Id",
                onDelete: ReferentialAction.Cascade);
        }
    }
}
