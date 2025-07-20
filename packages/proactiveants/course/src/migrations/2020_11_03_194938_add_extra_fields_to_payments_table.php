<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('co_payments', function (Blueprint $table) {
            $table->string('method')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('file_path')->nullable();
            $table->integer('payment_for_month')->nullable();
            $table->integer('payment_for_year')->nullable();
            $table->string('memo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('co_payments', function (Blueprint $table) {
            //
        });
    }
}
