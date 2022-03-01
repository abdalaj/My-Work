<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('emp_id');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')
                ->references('id')
                ->on('persons')
                ->onDelete('cascade');
            $table->integer('sale_id')->unsigned()->nullable();
            $table->foreign('sale_id')
                ->references('id')
                ->on('persons')
                ->onDelete('cascade');
            $table->string('invoice_number');
            $table->string('invoice_type')->comment('orders,purchase');
            $table->string('payment_type')->comment('cash,not cash,bank');
            $table->double('total');
            $table->double('paid');
            $table->double('due');
            $table->double('tax')->default(0);
            $table->double('discount')->default(0);
            $table->double('discount_type')->default(0);
            $table->text('note')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('bank_id')->nullable();
            $table->json('meta')->nullable();
            $table->date('invoice_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('order_detailes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')
                ->references('id')
                ->on('stores')
                ->onDelete('cascade');
            $table->string('store_name')->nullable();
            $table->string('unit_name')->nullable();
            $table->string('product_name')->nullable();
            $table->string('serial_number')->nullable();
            $table->date('expiration_date')->nullable();
            $table->integer('unit_id')->unsigned();
            $table->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onDelete('cascade');
            $table->integer('qty');
            $table->double('cost');
            $table->double('price')->nullable();
            $table->double('total');
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
        Schema::dropIfExists('order_detailes');
    }
}
