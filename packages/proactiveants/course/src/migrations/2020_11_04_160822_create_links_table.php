<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('co_course_id');
            $table->integer('valid_for_month')->nullable();
            $table->integer('valid_for_year')->nullable();
            $table->text('description');
            $table->timestamps();
            $table->foreign('co_course_id')->references('id')->on('co_courses')->onDelete('cascade');
        });
        DB::statement("ALTER TABLE co_links ADD link MEDIUMBLOB NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('co_links');
    }
}
