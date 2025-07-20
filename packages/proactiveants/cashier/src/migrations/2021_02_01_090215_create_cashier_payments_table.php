<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashierPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_cashier_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ca_cashier_id');
            $table->unsignedBigInteger('co_payment_id');
            $table->timestamps();
            $table->foreign('ca_cashier_id')->references('id')->on('ca_cashiers')->onDelete('cascade');
            $table->foreign('co_payment_id')->references('id')->on('co_payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ca_cashier_payments');
    }
}
