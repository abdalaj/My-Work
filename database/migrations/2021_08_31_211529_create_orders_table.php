<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->nullable();
            $table->string('invoice_type')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('total')->nullable();
            $table->string('currency')->nullable();
            $table->string('paid')->nullable();
            $table->string('due')->nullable();
            $table->string('tax')->nullable();
            $table->string('note')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('whoadd')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
