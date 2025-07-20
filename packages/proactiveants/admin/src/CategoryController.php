<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Image;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Store\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $parents = Category::whereNull('parent_id')->get();
        return view('admin::store.category_list', ['categories' => Category::all(), 'parents' => $parents]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slang' => 'required|unique:store_categories,slang|alpha_dash'
        ]);
        $data = $request->all();
        //$data['slang'] = $this->generateSlang($data['name']);
        $data['parent_id'] = $data['parent_id']==0?null:$data['parent_id'];
        Category::create($data);
        return redirect()->back();
    }

    private function generateSlang(String $str){
        return preg_replace('/[[:space:]]+/','-',$str);
    }

    public function delete(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->delete();
        return redirect()->back();
    }

    public function publish($id)
    {
        $category = Category::findOrFail($id);
        $currentValue = $category->published=="No"?0:1;
        $category->published = 1 - intval($currentValue);
        $category->save();
        return redirect()->back();
    }

}