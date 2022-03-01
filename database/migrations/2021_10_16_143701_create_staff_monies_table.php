<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffMoniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_monies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mony')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('prushes_id')->nullable();
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
        Schema::dropIfExists('staff_monies');
    }
}
