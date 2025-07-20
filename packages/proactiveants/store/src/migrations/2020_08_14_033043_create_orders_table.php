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
        Schema::create('store_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('date');
            $table->string('status'); // OPEN|CHECKEDOUT|PAID|DISPATCHED|CANCELED
            $table->string('delivery_type'); // PICKUP|COURIER|NONE
            $table->string('payment_type'); // CARD|COD|NONE
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
        Schema::dropIfExists('store_orders');
    }
}
