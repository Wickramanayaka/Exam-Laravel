<?php

namespace ProactiveAnts\Exam;

use Illuminate\Database\Eloquent\Model;

class ExamPaperQuestion extends Model
{
    protected $table = 'ex_exam_paper_questions';
    protected $fillable = ['question_number', 'ex_exam_paper_id','ex_question_id', 'duration', 'mark', 'additional_info'];
}
