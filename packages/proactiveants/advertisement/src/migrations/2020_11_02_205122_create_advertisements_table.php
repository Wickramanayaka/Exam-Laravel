<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adv_advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link')->nullable();
            $table->unsignedBigInteger('adv_category_id');
            $table->integer('position')->default(1);
            $table->boolean('publish')->default(0);
            $table->timestamps();
            $table->foreign('adv_category_id')->references('id')->on('adv_categories')->onDelete('cascade');
        });

        DB::statement("ALTER TABLE adv_advertisements ADD image MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE adv_advertisements ADD description MEDIUMBLOB NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adv_advertisements');
    }
}
