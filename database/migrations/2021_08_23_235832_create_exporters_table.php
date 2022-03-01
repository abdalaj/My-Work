<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exporters', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('describ')->nullable();
            $table->string('qty')->nullable();
            $table->string('height')->nullable();
            $table->string('volum')->nullable();
            $table->string('safym2')->nullable();
            $table->string('price')->nullable();
            $table->string('amount')->nullable();
            $table->string('qty_refuse')->nullable();
            $table->string('allqty_refuse')->nullable();
            $table->string('amount_refuse')->nullable();
            $table->string('qty_found')->nullable();
            $table->string('qtyall_found')->nullable();
            $table->string('amount_found')->nullable();
            $table->string('import_miuns_publish_befor_discount')->nullable();
            $table->string('import_miuns_publish_after_discount')->nullable();
            $table->string('import_miuns_export')->nullable();
            $table->string('god')->nullable();
            $table->string('number_hawya')->nullable();
            $table->date('date')->nullable();
            $table->string('month')->nullable();
            $table->string('name_client')->nullable();
            $table->string('is_return')->default(0);
            $table->string('order_id')->nullable();
            $table->string('publisher_id')->nullable();
            $table->integer('store_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exporters');
    }
}
