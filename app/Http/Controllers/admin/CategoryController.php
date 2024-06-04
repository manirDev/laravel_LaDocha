<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        $dataList = DB::table('categories')->get()->where('parent_id', 0);
        return view('admin.category.index', ['categories' => $categories, 'dataList' => $dataList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add(Request $request){

    }
    public function create(Request $request)
    {
        $request->validate([
            //'brand_name' => 'required|unique:brands,brand_name',
            'title' => 'required',
            'parent_id' => 'required',
            'keywords' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'title.required' => 'Please enter category title',
            'parent_id.required' => 'Please select category parent',
            'keywords.required' => 'Please enter keywords',
            'image.required' => 'Please upload category image',
       ]);

        //handle image upload
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;

        //save to the database
        Category::insert([
            'title' => $request->title,
            'parent_id' => $request->parent_id,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'slug' => strtolower(str_replace(' ', '-', $request->title)),
            'image' => $save_url,
            'status' => $request->status,
        ]);

        //toast message
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
