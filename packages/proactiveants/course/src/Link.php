<?php

namespace ProactiveAnts\Course;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'co_links';
    protected $fillable = ['co_course_id', 'link', 'valid_for_month', 'valid_for_year', 'description'];
}
