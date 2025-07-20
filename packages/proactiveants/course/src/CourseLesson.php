<?php

namespace ProactiveAnts\Course;

use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    protected $table = 'co_course_lessons';
    protected $fillable = ['co_course_id', 'unit_id', 'valid_for_month', 'valid_for_year'];
}
