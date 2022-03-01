<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('number_herfy')->nullable();
            $table->string('number_factory')->nullable();
            $table->string('number_client')->nullable();
            $table->string('name_client')->nullable();
            $table->string('qty')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('volum')->nullable();
            $table->string('safy')->nullable();
            $table->string('discount')->nullable();
            $table->string('safy_after')->nullable();
            $table->string('price')->nullable();
            $table->string('amount')->nullable();
            $table->date('date')->nullable();
            $table->string('month')->nullable();
            $table->string('is_return')->default(0);
            $table->string('order_id')->nullable();
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
        Schema::dropIfExists('importants');
    }
}
