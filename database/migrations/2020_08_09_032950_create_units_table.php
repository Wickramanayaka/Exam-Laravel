<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('grade_subject_id');
            $table->integer('term_id')->default(1);
            $table->integer('language_id')->default(1);
            $table->string('slang');
            $table->decimal('price')->default(0);
            $table->integer('subject_id')->nullable();
            $table->integer('grade_id')->nullable();
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
        Schema::dropIfExists('units');
    }
}
