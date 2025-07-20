<?php

namespace ProactiveAnts\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProactiveAnts\Library\Category;
use Storage;
use Image;
use Illuminate\Support\Facades\Response;

class MaterialController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('library::index', compact('categories'));
    }
    function viewMaterialsByCategory($id){
        $category = Category::where('slang', $id)->firstOrFail();
        return view('library::materials_view_by_category', compact('category'));
    }
    public function downloadMaterial($id)
    {
        $material = Material::findOrFail($id);
        return Storage::disk('s3')->download($material->url);
    }

    public function fetchImage($id)
    {
        $material = Material::findOrFail($id);
        $image_file = Image::make($material->image);
        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }
}
