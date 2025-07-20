<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lsn_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('grade_subject_id');
            $table->integer('user_id');
            $table->date('date');
            $table->string('status'); // ACTIVE|CANCELED|UNPAID
            $table->decimal('amount')->default(0);
            $table->string('ipg_payment_id')->nullable();
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
        Schema::dropIfExists('lsn_subscriptions');
    }
}
