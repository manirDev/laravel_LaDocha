<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        foreach ($products as $product) {
            Image::factory()->count(5)->create([
                'product_id' => $product->id,
                //'image' => 'path/to/your/image.jpg', // Change this to the actual path of your images
            ]);
        }
    }

}
