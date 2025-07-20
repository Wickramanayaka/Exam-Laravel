<?php

namespace ProactiveAnts\Exam;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $table = 'ex_user_answers';

    protected $fillable = ['ex_tryout_id', 'ex_question_id', 'ex_answer_id', 'is_correct', 'mark'];
}
