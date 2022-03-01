<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderimgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliderimgs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img1');
            $table->string('img2');
            $table->string('img3');
            $table->string('img4');
            $table->string('img5');
            $table->string('img6');
            $table->string('img7');
            $table->string('img8');
            $table->string('img9');
            $table->string('img10');
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
        Schema::dropIfExists('sliderimgs');
    }
}
