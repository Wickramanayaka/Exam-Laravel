<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_order_id');
            $table->date('date');
            $table->decimal('amount')->default(0);
            $table->string('ipg_payment_id')->nullable();
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
        Schema::dropIfExists('store_payments');
    }
}
