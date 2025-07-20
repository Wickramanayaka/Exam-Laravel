<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lib_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('url');
            $table->integer('lib_category_id');
            $table->boolean('featured')->default(0);
            $table->string('slang');
            //$table->binary('image')->nullable();
            $table->boolean('published')->default(0);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE lib_materials ADD image MEDIUMBLOB NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lib_materials');
    }
}
