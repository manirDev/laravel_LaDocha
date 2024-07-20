<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Image::class;

    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence(3),
            'image' => 'upload/product_gallery/' . $this->faker->image('public/upload/product_gallery', 640, 480, null, false),
        ];
    }
}
