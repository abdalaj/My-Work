<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('room_id')->nullable();
            $table->string('start')->nullable();
            $table->string('copy_start')->nullable();
            $table->string('end')->nullable();
            $table->string('hours')->nullable();
            $table->string('price')->nullable();
            $table->string('fully')->nullable();
            $table->string('date')->nullable();
            $table->string('unique')->unique()->nullable();
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
        //
    }
}
