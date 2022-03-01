<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('many');
            $table->string('phone');
            $table->string('city');
            $table->string('carya');
            $table->text('describ');
            $table->string('details');
            $table->string('price');
            $table->string('user_item_id');
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
        Schema::dropIfExists('orderes');
    }
}
