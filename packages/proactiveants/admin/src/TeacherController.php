<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unit;
use Illuminate\Support\Facades\Response;
use Image;
use App\Teacher;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $teachers = Teacher::paginate(50);
        $keyword = '';
        if($request->has('keyword')){
            $teachers = Teacher::where('name','like','%'.$request->keyword.'%')
            ->paginate(25);
            $keyword = $request->keyword;
        }
        return view('admin::teachers.index', compact('teachers', 'keyword'));
    }

    public function activate($id)
    {
        $teacher = Teacher::findOrFail($id);
        $currentValue = $teacher->active;
        $teacher->active = 1 - intval($currentValue);
        $teacher->save();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slang' => 'required|alpha_dash|unique:teachers,slang',
            'image' => 'required',
            'rank' => 'required|numeric'
        ]);
        $image_file = $request->image;
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));
        Teacher::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'active' => 0,
            'slang' => $request->slang,
            'rank' => $request->rank
        ]);
        return redirect()->back();
    }

    public function fetchImage($id)
    {
        $teacher = Teacher::findOrFail($id);
        $image_file = Image::make($teacher->image);
        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }

    public function view($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin::teachers.view', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'slang' => 'required|alpha_dash|unique:teachers,slang,'.$id,
            'rank' => 'required|numeric',
            'id' => 'required'
        ]);
        $teacher = Teacher::findOrFail($request->id);
        if($request->has('image')){
            $image_file = $request->image;
            $image = Image::make($image_file);
            Response::make($image->encode('jpeg'));
            $teacher->image = $image;
        }
        $teacher->name = $request->name;
        $teacher->description = $request->description;
        $teacher->slang = $request->slang;
        $teacher->rank = $request->rank;
        $teacher->save();
        return redirect(url('/adm/teacher'));
    }
}