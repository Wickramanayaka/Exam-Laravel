<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamPaperSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_exam_paper_sets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('grade_id');
            $table->boolean('published')->default(0);
            $table->decimal('price')->default(0);
            $table->integer('ex_category_id');
            $table->timestamps();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ex_exam_paper_sets');
    }
}
