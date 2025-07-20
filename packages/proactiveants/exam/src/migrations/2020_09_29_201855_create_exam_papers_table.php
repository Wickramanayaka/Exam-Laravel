<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_exam_papers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('co_course_id');
            $table->string('slang');
            $table->boolean('published')->default(0);
            $table->boolean('is_free')->default(0);
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
        Schema::dropIfExists('ex_exam_papers');
    }
}
