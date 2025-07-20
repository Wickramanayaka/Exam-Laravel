<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemSeminarBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sem_seminar_bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('sem_seminar_id');
            $table->integer('sem_host_id');
            $table->string('requester_name');
            $table->string('mobile');
            $table->string('email');
            $table->string('sem_location_id');
            $table->date('date');
            $table->boolean('confirmed')->default(0);
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
        Schema::dropIfExists('sem_seminar_bookings');
    }
}
