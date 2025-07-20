<?php

namespace ProactiveAnts\Lesson;

use Illuminate\Database\Eloquent\Model;
use ProactiveAnts\Lesson\Video;

class View extends Model
{
    protected $table = 'lsn_views';

    protected $fillable = ['lsn_video_id','count'];

    public function video()
    {
        return $this->hasOne(Video::class, 'lsn_video_id');
    }
}
