<?php

namespace ProactiveAnts\Lesson;

use Illuminate\Database\Eloquent\Model;
use ProactiveAnts\Lesson\View;

class Video extends Model
{
    protected $table = 'lsn_videos';

    protected $fillable = [
        'name', 'unit_id', 'description', 'url', 'duration', 'sequence', 'slang', 'teacher_id', 'price', 'free'
    ];

    public function teacher()
    {
        return $this->belongsTo(\App\Teacher::class);
    }

    public function view()
    {
        return $this->hasOne(View::class,'lsn_video_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(SubscriptionVideo::class, 'lsn_video_id');
    }

    public function unit()
    {
       return $this->belongsTo(\App\Unit::class);
    }

    public function getPublishedAttribute($value)
    {
        return $value==1?"Yes":"No";
    }

}
