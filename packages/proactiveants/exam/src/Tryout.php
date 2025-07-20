<?php

namespace ProactiveAnts\Exam;

use Illuminate\Database\Eloquent\Model;
use ProactiveAnts\Exam\Answer;

class Tryout extends Model
{
    protected $table = 'ex_tryouts';

    protected $fillable = ['user_id', 'ex_exam_paper_id', 'start_at', 'end_at'];

    public function paper()
    {
        return $this->belongsTo(ExamPaper::class, 'ex_exam_paper_id');
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class, 'ex_tryout_id');
    }
}
