<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_products', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('author')->nullable();
            $table->string('publisher')->nullable();
            $table->integer('published_year')->nullable();
            $table->decimal('price')->default(0);
            $table->decimal('discount')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('store_category_id');
            $table->decimal('weight'); // Grams
            $table->string('slang');
            $table->boolean('published')->default(0);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE store_products ADD image MEDIUMBLOB NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_products');
    }
}
