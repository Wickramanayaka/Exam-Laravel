<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ex_exam_paper_set_id');
            $table->decimal('amount');
            $table->string('status')->default('UNPAID'); // UNPAID|ACTIVE|INACTIVE
            $table->string('ipg_payment_id')->nullable();
            $table->date('date');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ex_exam_paper_set_id')->references('id')->on('ex_exam_paper_sets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ex_purchases');
    }
}
