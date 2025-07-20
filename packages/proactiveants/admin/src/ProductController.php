<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Image;
use ProactiveAnts\Store\Product;
use ProactiveAnts\Store\Category;
use ProactiveAnts\Store\Tag;
use ProactiveAnts\Store\ProductTag;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::whereNotNull('parent_id')->where('published',1)->get();
        $products = Product::paginate(50);
        $keyword ='';
        if($request->has('keyword')){
            $products = Product::where('name','like','%'.$request->keyword.'%')
            ->orWhere('code','like','%'.$request->keyword.'%')
            ->paginate(50);
            $keyword = $request->keyword;
        }
        return view('admin::store.product_list', ['products' => $products, 'categories' => $categories,'keyword'=> $keyword]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'weight' => 'required|numeric',
            'image' => 'required|image|max:2048',
            'store_category_id' => 'required|numeric',
            'slang' => 'required|unique:store_categories,slang|alpha_dash'
        ]);
        $image_file = $request->image;
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));
        $data = $request->all();
        //$data['slang'] = $this->generateSlang($data['name']).$this->generateSlang($data['code']);
        $data['image'] = $image;
        Product::create($data);
        return redirect()->back();
    }

    private function generateSlang(String $str){
        return preg_replace('/[[:space:]]+/','-',$str);
    }

    public function delete(Request $request)
    {
        /**
         * TBD - Only delete permit if the product is not associate with any order.
         */
        $product = Product::findOrFail($request->id);
        $product->delete();
        return redirect()->back();
    }

    public function publish($id)
    {
        $product = Product::findOrFail($id);
        $currentValue = $product->published=="No"?0:1;
        $product->published = 1 - intval($currentValue);
        $product->save();
        return redirect()->back();
    }

    public function fetchImage($id)
    {
        $product = Product::findOrFail($id);
        $image_file = Image::make($product->image);
        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }

    public function viewProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::whereNotNull('parent_id')->where('published',1)->get();
        $tags = Tag::all();
        return view('admin::store.product_view', compact('product','categories', 'tags'));
    }

    public function updatePriceQtyWeight(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);
        $product = Product::findOrFail($request->id);
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->weight = $request->weight;
        $product->save();
        return redirect(url('adm/bst'));
    }

    public function updateInfo(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'id' => 'required|numeric',
            'store_category_id' => 'required|numeric',
            'slang' => 'required|unique:store_products,slang|alpha_dash'
        ]);
        $product = Product::findOrFail($request->id);
        $product->code = $request->code;
        $product->name = $request->name;
        $product->slang = $request->slang;
        $product->description = $request->description;
        $product->store_category_id = $request->store_category_id;
        $product->author = $request->author;
        $product->publisher = $request->publisher;
        $product->published_year = $request->published_year;
        $product->slang = $this->generateSlang($request->name).$this->generateSlang($request->code);
        $product->save();
        return redirect(url('adm/bst'));
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'image' => 'required|image|max:2048',
        ]);
        $product = Product::findOrFail($request->id);
        $image_file = $request->image;
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));
        $product->image = $image;
        $product->save();
        return redirect(url('adm/bst'));
    }

    public function updateTag(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);
        $product = Product::findOrFail($request->id);
        $product_tags = ProductTag::where('store_product_id',$product->id)->get();
        foreach ($product_tags as $value) {
            $value->delete();
        }
        if($request->has('tag')){
            foreach ($request->tag as $key => $value) {
                ProductTag::create([
                    'store_tag_id' => $value,
                    'store_product_id' => $request->id
                ]);
            }
        }
        return redirect(url('adm/bst'));
    }


}