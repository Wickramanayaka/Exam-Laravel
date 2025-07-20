<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ProactiveAnts\Course\Course;

class Teacher extends Model
{
    protected $fillable = ['name', 'description', 'active', 'image', 'rank', 'slang'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
