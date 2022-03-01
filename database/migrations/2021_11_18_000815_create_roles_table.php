<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });
        DB::insert("INSERT INTO roles (`name`) VALUES
            ('viewImportant'),
            ('addImportant'),
            ('editImportant'),
            ('deleteImportant'),
            ('viewPublisher'),
            ('addPublisher'),
            ('editPublisher'),
            ('deletePublisher'),
            ('viewExporter'),
            ('addExporter'),
            ('editExporter'),
            ('deleteExporter'),
            ('viewPrushes'),
            ('addPrushes'),
            ('editPrushes'),
            ('deletePrushes'),
            ('viewExpenses'),
            ('addExpenses'),
            ('editExpenses'),
            ('deleteExpenses'),
            ('viewStore'),
            ('addStore'),
            ('editStore'),
            ('deleteStore'),
            ('viewBank'),
            ('addBank'),
            ('editBank'),
            ('deleteBank'),
            ('pushBank'),
            ('viewCurrancies'),
            ('addCurrancies'),
            ('editCurrancies'),
            ('deleteCurrancies'),
            ('viewSupplier'),
            ('addSupplier'),
            ('editSupplier'),
            ('deleteSupplier'),
            ('tamlatSupplier'),
            ('tahsilSupplier'),
            ('viewShorka'),
            ('addShorka'),
            ('editShorka'),
            ('deleteShorka'),
            ('detailsShorka'),
            ('viewStaff'),
            ('addStaff'),
            ('editStaff'),
            ('deleteStaff'),
            ('detailStaff'),
            ('winStaff'),
            ('loseStaff'),
            ('viewUsers'),
            ('addUsers'),
            ('editUsers'),
            ('deleteUsers'),
            ('permissionUsers'),
            ('viewReportOrder'),
            ('deleteReportOrder'),
            ('detailsReportOrder'),
            ('viewReportTahsil'),
            ('viewReporteidaa'),
            ('viewReportShorka'),
            ('viewReportLogs'),
            ('viewReportStoreChart'),
            ('viewReportStoreByany'),
            ('viewReportSimpleChart'),
            ('viewReporSupplierChart'),
            ('backupDB'),
            ('restoreDB'),
            ('deleteDB'),
            ('resetAllDB'),
            ('clearCashDB'),
            ('todayreport'),
            ('viewPurchases'),
            ('addPurchases'),
            ('editPurchases'),
            ('deletePurchases'),
            ('editOrders'),
            ('showExpire'),
            ('addExpire'),
            ('editExpire'),
            ('deleteExpire'),
            ('showReturn'),
            ('addReturn')
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
