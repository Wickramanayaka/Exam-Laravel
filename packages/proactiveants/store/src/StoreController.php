<?php

namespace ProactiveAnts\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Image;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Store\Tag;
use ProactiveAnts\Store\Category;

class StoreController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->published()->get();
        $tags = Tag::all();
        return view('store::product_by_tag', compact('categories', 'tags'));
    }

    public function viewProductByCategory($id)
    {
        $category = Category::where('slang',$id)->published()->firstOrFail();
        $categories = Category::whereNull('parent_id')->published()->get();
        $products = Product::where('store_category_id', $category->id)->published()->get();
        return view('store::product_by_category', compact('categories', 'products','category'));
    }

    public function viewProduct($id)
    {
        $categories = Category::whereNull('parent_id')->published()->get();
        $product = Product::where('slang', $id)->published()->firstOrFail();
        $products = Product::where('store_category_id', $product->store_category_id)->published()->where('quantity','>','0')->inRandomOrder()->limit(10)->get();
        return view('store::product_view', compact('categories', 'product', 'products'));
    }

    public function fetchImage($id)
    {
        $product = Product::findOrFail($id);
        $image_file = Image::make($product->image);
        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }
}