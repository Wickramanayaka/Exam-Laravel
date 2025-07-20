<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lsn_subscription_videos', function (Blueprint $table) {
            $table->id();
            $table->integer('lsn_video_id');
            $table->unsignedBigInteger('lsn_subscription_id');
            $table->timestamps();
            $table->foreign('lsn_subscription_id')->references('id')->on('lsn_subscriptions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lsn_subscription_videos');
    }
}
