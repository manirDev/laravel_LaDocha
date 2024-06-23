<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
class CategoryController extends Controller
{

    #getParentTree function to be reached in everywhere
    protected $appends = ['getParentTree'];

    public static function  getParentTree($category, $title){
        if ($category->parent_id == 0) {
            return $title;
        }
        $parent = Category::find($category->parent_id);
        $title = $parent->title . ' > ' . $title;

        return CategoryController::getParentTree($parent, $title);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('children')->get();
        return view('admin.category.index', ['categories' => $categories]);
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
        $category = Category::findOrFail($id);
        $categories = Category::with('children')->get(); // Fetch all categories

        return response()->json([
            'title' => $category->title,
            'keywords' => $category->keywords,
            'description' => $category->description,
            'status' => $category->status,
            'id' => $category->id,
            'image' => $category->image,
            'parent_id' => $category->parent_id,
            'categories' => $categories // Include the list of categories
        ]);
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
       //dd($oldImg);
        //dd($request->title);
        if ($request->hasFile('image')) {
            //delete old image
            if ($oldImg != null){
                unlink($oldImg);
            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
            $save_url = 'upload/category/'.$name_gen;

            //save to the database
            Category::findOrFail($id)->update([
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
                'message' => 'Category Updated Successfully',
                'alert-type' => 'info'
            );
        }
        else{
            //save to the database
            Category::findOrFail($id)->update([
                'title' => $request->title,
                'parent_id' => $request->parent_id,
                'keywords' => $request->keywords,
                'description' => $request->description,
                'slug' => strtolower(str_replace(' ', '-', $request->title)),
                'status' => $request->status,
            ]);

            //toast message
            $notification = array(
                'message' => 'Category Updated Successfully',
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
        $category = Category::findOrFail($id);
        $image_path = $category->image;

        // Delete the image file if it exists
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Delete the category record
        $category->delete();

        return response()->json(['success' => true, 'message' => 'Category deleted successfully.']);
    }
}
