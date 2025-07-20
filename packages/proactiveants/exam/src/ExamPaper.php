<?php

namespace ProactiveAnts\Exam;

use Illuminate\Database\Eloquent\Model;
use App\GradeSubject;
use ProactiveAnts\Course\Course;

class ExamPaper extends Model
{
    protected $fillable = ['name', 'co_course_id','slang', 'published', 'is_free'];

    protected $table = 'ex_exam_papers';

    public function gradeSubject()
    {
        return $this->belongsTo(GradeSubject::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class,'ex_exam_paper_questions','ex_exam_paper_id','ex_question_id')->withPivot('question_number','duration','mark','id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'co_course_id');
    }
    
}
