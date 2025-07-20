<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_user_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ex_tryout_id');
            $table->unsignedBigInteger('ex_question_id');
            $table->unsignedBigInteger('ex_answer_id');
            $table->boolean('is_correct')->default(0);
            $table->decimal('mark')->default(0);
            $table->timestamps();
            $table->foreign('ex_tryout_id')->references('id')->on('ex_tryouts')->onDelete('cascade');
            $table->foreign('ex_question_id')->references('id')->on('ex_questions')->onDelete('cascade');
            $table->foreign('ex_answer_id')->references('id')->on('ex_answers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ex_user_answers');
    }
}
