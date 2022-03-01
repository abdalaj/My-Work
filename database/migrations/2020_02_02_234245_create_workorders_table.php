<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workorders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->string('product_name');
            $table->date('date');
            $table->integer('itemqty');
            $table->timestamps();
        });
        Schema::create('workorders_detailes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('workorder_id')->unsigned();
            $table->integer('raw_unit_id')->unsigned();
            $table->string('raw_name');
            $table->integer('totalneedqty');
            $table->string('raw_unit_text');
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
        Schema::dropIfExists('workorders_detailes');
        Schema::dropIfExists('workorders');
    }
}
