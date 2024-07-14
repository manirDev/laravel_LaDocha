<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Services\OpenAIService;
use Illuminate\Http\Request;

class OpenAIController extends Controller
{

    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function generateProductDetails(Request $request)
    {

        $productName = $request->input('title');
        $generatedData = $this->openAIService->generateProductDetails($productName);

        $data = json_decode($generatedData, true);

        // Parsing AI-generated response into appropriate fields
        $description = $data['description'] ?? null;
        $keywords = $data['keywords'] ?? null;
        $price = $data['price'] ?? null;
        $image = $data['image'] ?? null;
        $detail = $data['detail'] ?? null;

        // Ensure the category exists
        $category = Category::firstOrCreate(['name' => $data['category']]);

        // Create the product
        $product = Product::create([
            'title' => $productName,
            'keywords' => $keywords,
            'description' => $description,
            'image' => $image,
            'category_id' => $category->id,
            'price' => $price,
            'quantity' => 1,
            'minquantity' => 5,
            'tax' => 18,
            'detail' => $detail,
            'slug' => str_slug($productName),
            'status' => 'False',
        ]);

        dd($product);
        return response()->json(['message' => 'Product generated successfully!', 'product' => $product]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.product.openAi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
