<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ProactiveAnts\Lesson\Video;

class Unit extends Model
{
    protected $fillable = [
        'number', 'name', 'description', 'slang', 'price', 'grade_subject_id',  'term_id', 
        'language_id', 'subject_id', 'grade_id'
    ];
    
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function gradeSubject()
    {
        return $this->belongsTo(GradeSubject::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
