<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->get();
        $categories = DB::table('categories')->get();
        return view('admin.product.index', ['products' => $products, 'categories' => $categories]);
    }

    public function add()
    {
        $categories = DB::table('categories')->get();
        return view('admin.product.add', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            //'brand_name' => 'required|unique:brands,brand_name',
            'title' => 'required',
            'category_id' => 'required',
            'keywords' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'title.required' => 'Please enter product title',
            'category_id.required' => 'Please select a category',
            'keywords.required' => 'Please enter keywords',
            'price.required' => 'Please enter price',
            'image.required' => 'Please upload category image',
        ]);

        //handle image upload
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/product/'.$name_gen);
        $save_url = 'upload/product/'.$name_gen;

        //save to the database
        Product::insert([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'minquantity' => $request->minquantity,
            'tax' => $request->tax,
            'detail' => $request->detail,
            'slug' => strtolower(str_replace(' ', '-', $request->title)),
            'image' => $save_url,
            'status' => $request->status,
        ]);

        //toast message
        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.product')->with($notification);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $oldImg = $request->oldImg;
        if ($request->hasFile('image')) {
            //delete old image
            if ($oldImg != null){
                unlink($oldImg);
            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/product/'.$name_gen);
            $save_url = 'upload/product/'.$name_gen;

            //save to the database
            Product::findOrFail($id)->update([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'category_id' => $request->category_id,
                'keywords' => $request->keywords,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'minquantity' => $request->minquantity,
                'tax' => $request->tax,
                'detail' => $request->detail,
                'slug' => strtolower(str_replace(' ', '-', $request->title)),
                'image' => $save_url,
                'status' => $request->status,
            ]);

            //toast message
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'info'
            );
        }
        else{
            //save to the database
            Product::findOrFail($id)->update([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'category_id' => $request->category_id,
                'keywords' => $request->keywords,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'minquantity' => $request->minquantity,
                'tax' => $request->tax,
                'detail' => $request->detail,
                'slug' => strtolower(str_replace(' ', '-', $request->title)),
                'status' => $request->status,
            ]);

            //toast message
            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'info'
            );
        }
        return Redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $image_path = $product->image;

        // Delete the image file if it exists
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Delete the category record
        $product->delete();

        return response()->json(['success' => true, 'message' => 'Product deleted successfully.']);
    }
}
