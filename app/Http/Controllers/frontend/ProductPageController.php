<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    //
    public function index($productID, $slug){
        $product = Product::find($productID);
        $slider = Image::select('id', 'image')->where('product_id',$productID)->get();

        //$reviews = Review::where('content_id', $id)->latest()->paginate(3);
        //dd($product);
        $upSell = Product::select('id','category_id', 'title', 'image', 'description', 'price', 'slug', 'created_at','user_id')->where('price', '<=', $product->price)->limit(6)->get();
        $hotDeal = Product::select('id', 'title', 'image', 'description', 'price', 'slug')->latest()->limit(3)->inRandomOrder()->get();
        $data= [
            'product' => $product,
            'upSell' => $upSell,
            'slider'=> $slider,
            'hotDeal' => $hotDeal
        ];
        return view('frontend.pages.productDetailPage', $data);
    }
}
