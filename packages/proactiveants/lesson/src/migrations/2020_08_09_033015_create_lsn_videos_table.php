<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatelsnVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lsn_videos', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('url');
            $table->double('duration');
            $table->integer('sequence')->default(1);
            $table->string('slang');
            $table->integer('teacher_id');
            $table->decimal('price')->default(0);
            $table->boolean('free')->default(0);
            $table->boolean('published')->default(0);
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
        Schema::dropIfExists('lsn_videos');
    }
}
