<?php

namespace ProactiveAnts\Course;

use Illuminate\Database\Eloquent\Model;
use ProactiveAnts\Library\Material;
use ProactiveAnts\lesson\Video;
use ProactiveAnts\Exam\ExamPaper;
use App\Enroll;

class Course extends Model
{
    protected $table = 'co_courses';
    protected $fillable = ['name', 'publish','teacher_id','day','time','fee','grade_id','subject_id', 'description','slang', 'co_category_id'];

    public function teacher()
    {
        return $this->belongsTo(\App\Teacher::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'co_category_id');
    }

    public function links()
    {
        return $this->hasMany(Link::class,'co_course_id');
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class,'co_course_materials','co_course_id', 'lib_material_id')->withPivot(['valid_for_month', 'valid_for_year', 'id']);
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class,'co_course_videos','co_course_id', 'lsn_video_id')->withPivot(['valid_for_month', 'valid_for_year','id']);
    }

    public function enrolls()
    {
        return $this->hasMany(Enroll::class, 'co_course_id','id');
    }

    public function papers()
    {
        return $this->hasMany(ExamPaper::class,'co_course_id');
    }
}
