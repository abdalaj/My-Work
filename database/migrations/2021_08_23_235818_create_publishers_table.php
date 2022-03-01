<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('number_makina')->nullable();
            $table->string('volum_almaza')->nullable();
            $table->string('volum_publish')->nullable();
            $table->string('volum_amount')->nullable();
            $table->string('number_smears')->nullable();
            $table->string('number_tables')->nullable();
            $table->string('copy_number_tables')->nullable();
            $table->string('qty_publish')->nullable();
            $table->string('tip')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('volum')->nullable();
            $table->string('safy')->nullable();
            $table->string('price')->nullable();
            $table->string('amount')->nullable();
            $table->string('price_mears')->nullable();
            $table->string('amount_mears')->nullable();
            $table->string('amount_all')->nullable();
            $table->string('price_charge')->nullable();
            $table->string('amount_all_plus')->nullable();
            $table->string('safym2')->nullable();
            $table->string('amount_with_safym2')->nullable();
            $table->date('date')->nullable();
            $table->string('month')->nullable();
            $table->string('name_client')->nullable();
            $table->string('order_id')->nullable();
            $table->string('important_id')->nullable();
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
        Schema::dropIfExists('publishers');
    }
}
