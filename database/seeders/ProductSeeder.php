<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all categories
        $categories = Category::all();

        // Iterate through each category and create products
        foreach ($categories as $category) {
            // Create a large number of products for each category
            Product::factory()->count(20)->create([
                'category_id' => $category->id,
            ]);
        }
    }
}
