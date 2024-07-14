<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        // Load product data from the external file
        $productData = include('product_data.php');

        // Randomly pick a product from the array
        $product = $this->faker->randomElement($productData);
        $categories = Category::where('parent_id', '!=', 0)->pluck('id')->toArray();
        return [
            'title' => $product['title'],
            'keywords' => $product['keywords'],
            'description' => $product['description'],
            'image' => 'upload/product/' . $this->faker->image('public/upload/product', 640, 480, null, false),
            'category_id' => function () use ($categories) {
                // Select a random category ID from the available categories
                $randomCategoryId = $this->faker->randomElement($categories);

                // Retrieve the category and ensure it's not a top-level parent category
                $category = Category::find($randomCategoryId);
                while ($category->parent_id == 0) {
                    $randomCategoryId = $this->faker->randomElement($categories);
                    $category = Category::find($randomCategoryId);
                }

                return $randomCategoryId;
            },
            'user_id' => 1, // assuming a default user id
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'quantity' => $this->faker->numberBetween(1, 100),
            'minquantity' => $this->faker->numberBetween(1, 10),
            'tax' => $this->faker->numberBetween(1, 20),
            'detail' => $product['detail'],
            'slug' => Str::slug($product['title']),
            'status' => 'False',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
