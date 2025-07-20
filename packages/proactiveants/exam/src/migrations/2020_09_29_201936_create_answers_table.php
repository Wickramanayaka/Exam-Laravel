<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_answers', function (Blueprint $table) {
            $table->id();
            $table->integer('answer_number');
            $table->unsignedBigInteger('ex_question_id');
            $table->boolean('is_correct')->default(0);
            //$table->blob('answer');
            $table->timestamps();
            $table->foreign('ex_question_id')->references('id')->on('ex_questions')->onDelete('cascade');
        });
        DB::statement("ALTER TABLE ex_answers ADD answer MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ex_answers');
    }
}
