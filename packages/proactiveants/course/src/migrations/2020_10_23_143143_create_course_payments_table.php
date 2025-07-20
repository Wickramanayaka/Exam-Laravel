<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('co_course_id');
            $table->unsignedBigInteger('user_id');
            $table->string('reg_number')->nullable();
            $table->decimal('amount')->default(0);
            $table->date('date');
            $table->string('ipg_payment_id')->nullable();
            $table->string('status')->default('UNPAID'); // cancel payment = UNPAID | payment success = PAID
            $table->timestamps();
            $table->foreign('co_course_id')->references('id')->on('co_courses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('co_payments');
    }
}
