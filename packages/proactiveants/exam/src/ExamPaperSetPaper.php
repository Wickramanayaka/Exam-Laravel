<?php

namespace ProactiveAnts\Exam;

use Illuminate\Database\Eloquent\Model;

class ExamPaperSetPaper extends Model
{
    protected $table = 'ex_exam_paper_set_papers';

    protected $fillable = ['ex_exam_paper_id', 'ex_exam_paper_set_id'];
}
