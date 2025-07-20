<?php

namespace ProactiveAnts\Course;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'co_categories';

    protected $fillable = ['name'];
}
