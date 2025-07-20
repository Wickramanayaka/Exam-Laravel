<?php

namespace ProactiveAnts\Lesson;

use Illuminate\Database\Eloquent\Model;

class SubscriptionVideo extends Model
{
    protected $table = 'lsn_subscription_videos';

    protected $fillable = ['lsn_video_id', 'lsn_subscription_id'];
}
