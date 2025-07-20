<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProactiveAnts\Library\Material;
use Illuminate\Support\Facades\Response;
use Image;
use Storage;
use ProactiveAnts\Library\Category;

class LibraryController extends Controller
{
    public function index(Request $request)
    {
        $materials = Material::paginate(25);
        $keyword = '';
        if($request->has('keyword')){
            $materials = Material::where('name','like','%'.$request->keyword.'%')
            ->orWhere('url','like','%'.$request->keyword.'%')
            ->paginate(25);
            $keyword = $request->keyword;
        }
        $categories = Category::all();
        return view('admin::library.index', compact('materials','keyword','categories'));
    }

    /**
     * Store method for old material form creation
     */
    
    /**public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'image' => 'required|image|max:2048',
            'slang' => 'required|unique:lib_materials,slang|alpha_dash'
        ]);
        $image_file = $request->image;
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));
        $form_data =array(
            'name' => $request->name,
            'url' => $request->url,
            'description' => $request->description,
            'image' => $image,
            'lib_category_id' => $request->category,
            'featured' => $request->has('featured')?1:0,
            'slang' => $request->slang
        );
        Material::create($form_data);
        return redirect(url('adm/lib'));
    }*/

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slang' => 'required|unique:lib_materials,slang|alpha_dash'
        ]);
        if($request->has('file')){
            $path = Storage::disk('s3')->put('', $request->file);
        }
        else{
            $path='';
        }
        $form_data =array(
            'name' => $request->name,
            'url' => $path,
            'description' => $request->description,
            'image' => "",
            'lib_category_id' => $request->category,
            'featured' => 0,
            'slang' => $request->slang
        );
        Material::create($form_data);
        return redirect(url('adm/lib'));
    }

    private function generateSlang(String $str){
        return preg_replace('/[[:space:]]+/','-',$str);
    }

    public function fetchImage($id)
    {
        $material = Material::findOrFail($id);
        $image_file = Image::make($material->image);
        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $material = Material::findOrFail($request->id);
        Storage::disk('s3')->delete($material->url);
        $material->delete();
        return redirect()->back();
    }

    public function featured($id)
    {
        $material = Material::findOrFail($id);
        $currentValue = $material->featured=="No"?0:1;
        $material->featured = 1 - intval($currentValue);
        $material->save();
        return redirect()->back();
    }

    public function downloadMaterial($id)
    {
        $material = Material::findOrFail($id);
        return Storage::disk('s3')->download($material->url);
    }
}
