<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Image;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Course\Category;
use ProactiveAnts\Course\Course;
use App\Teacher;
use ProactiveAnts\Library\Material;
use ProactiveAnts\Course\Link;
use ProactiveAnts\Lesson\Video;
use ProactiveAnts\Course\CourseLesson;
use ProactiveAnts\Course\CourseVideo;
use ProactiveAnts\Course\CourseMaterial;
use ProactiveAnts\Course\Payment;
use App\Enroll;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::paginate(25);
        $teachers = Teacher::where('active', 1)->get();
        $categories = Category::all();
        $keyword = '';
        if($request->has('keyword')){
            $courses = Course::where('name','like','%'.$request->keyword.'%')
            ->orWhere('day','like','%'.$request->keyword.'%')
            ->orWhere('time','like','%'.$request->keyword.'%')
            ->orWhere('fee','like','%'.$request->keyword.'%')
            ->paginate(25);
            $keyword = $request->keyword;
        }
        return view('admin::courses.index', compact('courses', 'teachers', 'categories','keyword'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'slang' => 'required|alpha_dash|unique:co_courses,slang',
            'day' => 'required',
            'time' => 'required',
            'fee' => 'required|numeric',
            'teacher_id' => 'required',
            'co_category_id' => 'required',
        ]);
        Course::create($request->all());
        return  redirect()->back();

    }

    public function publish($id)
    {
        $course = Course::findOrFail($id);
        $currentValue = $course->publish;
        $course->publish = 1 - intval($currentValue);
        $course->save();
        return redirect()->back();
    }

    public function view($id)
    {
        $course = Course::findOrFail($id);
        $materials = Material::all();
        $links = Link::where('co_course_id',$id)->get();
        $videos = Video::where('published',1)->get();
        return view('admin::courses.course_view', compact('course','materials','links','videos'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:co_courses,id',
            'name' => 'required',
            'day' => 'required',
            'time' => 'required',
            'fee' => 'required'
        ]);
        $course = Course::findOrFail($request->id);
        $course->name = $request->name;
        $course->day = $request->day;
        $course->time = $request->time;
        $course->fee = $request->fee;
        $course->save();
        return redirect()->back();
    }

    public function enrollDelete(Request $request)
    {
        $enroll = Enroll::findOrFail($request->id);
        $enroll->delete();
        return redirect()->back();
    }
}