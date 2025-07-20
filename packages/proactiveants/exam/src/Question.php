<?php

namespace ProactiveAnts\Exam;

use Illuminate\Database\Eloquent\Model;
use ProactiveAnts\Exam\Answer;
use App\GradeSubject;
use ProactiveAnts\Course\Course;

class Question extends Model
{
    protected $table = 'ex_questions';
    protected $fillable = [
        'question', 'co_course_id', 'additional_info'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class,'ex_question_id');
    }

    public function gradeSubject()
    {
        return $this->belongsTo(GradeSubject::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class,'ex_question_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
