<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_questions', function (Blueprint $table) {
            $table->id();
            //$table->blob('question');
            $table->integer('co_course_id');
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE ex_questions ADD question MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ex_questions');
    }
}
