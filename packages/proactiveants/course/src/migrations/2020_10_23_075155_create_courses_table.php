<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('co_category_id');
            $table->unsignedBigInteger('teacher_id');
            $table->string('day')->nullable();
            $table->string('time')->nullable();
            $table->decimal('fee')->default(0);
            $table->integer('grade_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->boolean('publish')->default(0);
            $table->string('slang')->uniqe();
            $table->timestamps();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
        DB::statement("ALTER TABLE co_courses ADD image MEDIUMBLOB NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('co_courses');
    }
}
