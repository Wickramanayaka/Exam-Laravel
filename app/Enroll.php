<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ProactiveAnts\Course\Course;

class Enroll extends Model
{
    protected $fillable = ['co_course_id', 'user_id', 'date'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'co_course_id');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
