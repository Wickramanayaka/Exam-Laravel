<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Image;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Advertisement\Advertisement;
use ProactiveAnts\Advertisement\Category;

class AdvertisementController extends Controller
{
    public function index()
    {
        $ads = Advertisement::all();
        $categories = Category::all();
        return view('admin::advertisements.index', compact('ads', 'categories'));
    }

    public function activate($id)
    {
        $adv = Advertisement::findOrFail($id);
        $currentValue = $adv->publish;
        $adv->publish = 1 - intval($currentValue);
        $adv->save();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'position' => 'required|numeric',
            'adv_category_id' => 'required'
        ]);
        $image_file = $request->image;
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));
        Advertisement::create([
            'name' => $request->name,
            'description' => "",
            'image' => $image,
            'publish' => 0,
            'position' => $request->position,
            'adv_category_id' => $request->adv_category_id
        ]);
        return redirect()->back();
    }

    public function fetchImage($id)
    {
        $adv = Advertisement::findOrFail($id);
        $image_file = Image::make($adv->image);
        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $adv = Advertisement::findOrFail($request->id);
        $adv->delete();
        return redirect()->back();
    }
}