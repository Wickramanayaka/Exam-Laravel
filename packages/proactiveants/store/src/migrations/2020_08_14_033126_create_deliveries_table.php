<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_deliveries', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount')->default(0);
            $table->unsignedBigInteger('store_order_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('telephone');
            $table->string('email');
            $table->string('address_line');
            $table->string('street')->nullable();
            $table->string('city');
            $table->string('district');
            $table->timestamps();
            $table->foreign('store_order_id')->references('id')->on('store_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_deliveries');
    }
}
