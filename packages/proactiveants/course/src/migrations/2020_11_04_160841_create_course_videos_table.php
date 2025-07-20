<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_course_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('co_course_id');
            $table->unsignedBigInteger('lsn_video_id');
            $table->integer('valid_for_month')->nullable();
            $table->integer('valid_for_year')->nullable();
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
        Schema::dropIfExists('co_course_videos');
    }
}
