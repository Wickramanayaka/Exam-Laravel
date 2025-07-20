<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamPaperSetPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_exam_paper_set_papers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ex_exam_paper_set_id');
            $table->unsignedBigInteger('ex_exam_paper_id');
            $table->timestamps();
            $table->foreign('ex_exam_paper_set_id')->references('id')->on('ex_exam_paper_sets')->onDelete('cascade');
            $table->foreign('ex_exam_paper_id')->references('id')->on('ex_exam_papers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ex_exam_paper_set_papers');
    }
}
