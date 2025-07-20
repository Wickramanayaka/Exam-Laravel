<?php

namespace ProactiveAnts\Course;

use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{
    protected $table = 'co_course_materials';
    protected $fillable = ['co_course_id', 'lib_material_id', 'valid_for_month', 'valid_for_year'];
}
