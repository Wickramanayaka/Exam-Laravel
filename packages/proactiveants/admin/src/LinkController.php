<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Course\Link;

class LinkController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:co_courses,id',
            'link' => 'required',
            'description' => 'required'
        ]);
        Link::create([
            'co_course_id' => $request->id,
            'link' => $request->link,
            'valid_for_month' => date('m'),
            'valid_for_year' => date('Y'),
            'description' => $request->description
        ]);
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $link = Link::findOrFail($request->id);
        $link->delete();
        return redirect()->back();
    }
}