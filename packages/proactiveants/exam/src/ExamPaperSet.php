<?php

namespace ProactiveAnts\Exam;

use Illuminate\Database\Eloquent\Model;
use App\Grade;
use ProactiveAnts\Exam\ExamPaper;
use ProactiveAnts\Exam\Category;

class ExamPaperSet extends Model
{
    protected $table = 'ex_exam_paper_sets';

    protected $fillable =['name', 'grade_id', 'published', 'price', 'ex_category_id'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function papers()
    {
        return $this->belongsToMany(ExamPaper::class,'ex_exam_paper_set_papers','ex_exam_paper_set_id','ex_exam_paper_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'ex_category_id');
    }
}
