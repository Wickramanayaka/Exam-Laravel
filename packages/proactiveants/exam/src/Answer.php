<?php

namespace ProactiveAnts\Exam;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'ex_answers';
    protected $fillable = ['ex_question_id', 'is_correct', 'answer', 'answer_number'];
}
