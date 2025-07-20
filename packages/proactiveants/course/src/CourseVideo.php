<?php

namespace ProactiveAnts\Course;

use Illuminate\Database\Eloquent\Model;
use ProactiveAnts\Lesson\Video;

class CourseVideo extends Model
{
    protected $table = 'co_course_videos';
    protected $fillable = ['co_course_id', 'lsn_video_id', 'valid_for_month', 'valid_for_year'];

    public function video()
    {
        return $this->belongsTo(Video::class,'lsn_video_id');
    }
}
