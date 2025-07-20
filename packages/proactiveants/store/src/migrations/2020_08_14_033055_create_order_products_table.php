<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_product_id');
            $table->unsignedBigInteger('store_order_id');
            $table->integer('quantity')->default(0);
            $table->decimal('price')->defult(0);
            $table->decimal('discount')->defult(0);
            $table->decimal('amount')->default(0);
            $table->timestamps();
            $table->foreign('store_order_id')->references('id')->on('store_orders')->onDelete('cascade');
            $table->foreign('store_product_id')->references('id')->on('store_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_order_products');
    }
}
