<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Course\CourseMaterial;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:co_courses,id',
            'material' => 'required',
            'month' => 'required|numeric',
            'year' => 'required|numeric'
        ]);
        CourseMaterial::create([
            'co_course_id' => $request->id,
            'lib_material_id' => $request->material,
            'valid_for_month' => $request->month,
            'valid_for_year' => $request->year
        ]);
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $mat = CourseMaterial::findOrFail($request->id);
        $mat->delete();
        return redirect()->back();
    }
}