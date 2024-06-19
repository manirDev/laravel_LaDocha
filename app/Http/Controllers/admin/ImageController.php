<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $product = Product::find($product_id);
        $images = DB::table('images')->where('product_id', '=', $product_id)->get();
        return view("admin.product.product_gallery",['product' => $product, 'images'=>$images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'title.required' => 'Please enter category title',
            'image.required' => 'Please upload category image',
        ]);

        //handle image upload
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/product_gallery/'.$name_gen);
        $save_url = 'upload/product_gallery/'.$name_gen;

        //save to the database
        \App\Models\Image::insert([
            'title' => $request->title,
            'product_id' => $product_id,
            'image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Image added to the galley Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.image.add', ['product_id'=> $product_id])->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image= \App\Models\Image::findOrFail($id);
        $image_path = $image->image;

        // Delete the image file if it exists
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Delete the category record
        $image->delete();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
    }
}
