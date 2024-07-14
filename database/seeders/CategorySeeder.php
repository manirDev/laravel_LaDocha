<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Image;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Clothing' => [
                'Men' => ['Dresses', 'Shoes', 'Jackets', 'Sunglasses', 'Sport Wear', 'Blazers', 'Shirts'],
                'Women' => ['Handbags', 'Jewellery', 'Swimwear', 'Tops', 'Flats', 'Shoes', 'Winter Wear'],
                'Boys' => ['Toys & Games', 'Jeans', 'Shirts', 'Shoes', 'School Bags', 'Lunch Box', 'Footwear'],
                'Girls' => ['Sandals', 'Shorts', 'Dresses', 'Jewellery', 'Bags', 'Night Dress', 'Swim Wear']
            ],
            'Electronics' => [
                'Laptops' => ['Gaming', 'Laptop Skins', 'Apple', 'Dell', 'Lenovo', 'Microsoft', 'Asus', 'Adapters', 'Batteries', 'Cooling Pads'],
                'Desktops' => ['Routers & Modems', 'CPUs, Processors', 'PC Gaming Store', 'Graphics Cards', 'Components', 'Webcam', 'Memory (RAM)', 'Motherboards', 'Keyboards', 'Headphones'],
                'Cameras' => ['Accessories', 'Binoculars', 'Telescopes', 'Camcorders', 'Digital', 'Film Cameras', 'Flashes', 'Lenses', 'Surveillance', 'Tripods'],
                'Mobile Phones' => ['Apple', 'Samsung', 'Lenovo', 'Motorola', 'LeEco', 'Asus', 'Acer', 'Accessories', 'Headphones', 'Memory Cards']
            ],
            'Health & Beauty' => [
                'Skincare' => ['Cleansers', 'Moisturizers', 'Serums', 'Masks', 'Sunscreen', 'Toners'],
                'Makeup' => ['Foundation', 'Lipstick', 'Eyeshadow', 'Mascara', 'Makeup Brushes', 'Nail Polish'],
                'Haircare' => ['Shampoo', 'Conditioner', 'Hair Oil', 'Styling Products', 'Hair Tools', 'Hair Color'],
                'Personal Care' => ['Toothpaste', 'Deodorants', 'Shaving Cream', 'Feminine Hygiene', 'Hand Sanitizers', 'Bath & Body'],
            ],
            'Watches' => [
                'Men\'s Watches' => ['Analog Watches', 'Digital Watches', 'Smartwatches', 'Sports Watches', 'Luxury Watches'],
                'Women\'s Watches' => ['Fashion Watches', 'Designer Watches', 'Fitness Trackers', 'Diamond Watches', 'Casual Watches'],
                'Kids\' Watches' => ['Character Watches', 'Digital Watches', 'Sports Watches', 'Educational Watches', 'Waterproof Watches'],
            ],
            'Jewellery' => [
                'Rings' => ['Engagement Rings', 'Wedding Bands', 'Fashion Rings', 'Gemstone Rings', 'Stackable Rings'],
                'Necklaces' => ['Pendants', 'Chains', 'Chokers', 'Lockets', 'Statement Necklaces'],
                'Earrings' => ['Studs', 'Hoops', 'Dangle Earrings', 'Ear Cuffs', 'Clip-on Earrings'],
                'Bracelets' => ['Bangles', 'Cuffs', 'Charm Bracelets', 'Chain Bracelets', 'Beaded Bracelets'],
            ],
            'Shoes' => [
                'Men\'s Shoes' => ['Casual Shoes', 'Formal Shoes', 'Sports Shoes', 'Boots', 'Sandals', 'Slippers'],
                'Women\'s Shoes' => ['Heels', 'Flats', 'Sneakers', 'Boots', 'Sandals', 'Wedges'],
                'Kids\' Shoes' => ['School Shoes', 'Sports Shoes', 'Sandals', 'Boots', 'Slippers', 'Canvas Shoes'],
            ],
            'Kids & Girls' => [
                'Toys & Games' => ['Action Figures', 'Dolls', 'Board Games', 'Educational Toys', 'Outdoor Play', 'Building Toys'],
                'School Supplies' => ['Backpacks', 'Lunch Boxes', 'Stationery', 'Water Bottles', 'Pencil Cases', 'Notebooks'],
                'Clothing' => ['Tops', 'Bottoms', 'Dresses', 'Pajamas', 'Swimwear', 'Accessories'],
                'Baby Care' => ['Diapers', 'Baby Food', 'Baby Gear', 'Nursery Furniture', 'Strollers', 'Car Seats'],
            ],
        ];

        foreach ($categories as $title => $subcategories) {
            // Create the main category
            $parentCategory = $this->createCategory($title, 0);

            foreach ($subcategories as $subTitle => $subSubcategories) {
                // Create the subcategory
                $subCategory = $this->createCategory($subTitle, $parentCategory->id);

                foreach ($subSubcategories as $subSubTitle) {
                    // Create the sub-subcategory
                    $this->createCategory($subSubTitle, $subCategory->id);
                }
            }
        }
    }

    private function createCategory($title, $parentId)
    {
        // Generate a dummy image for the category
        $imagePath = $this->generateImage();

        // Create and return the category
        return Category::create([
            'title' => $title,
            'parent_id' => $parentId,
            'keywords' => 'keyword1, keyword2',
            'description' => 'Description for ' . $title,
            'slug' => strtolower(str_replace(' ', '-', $title)),
            'image' => $imagePath,
            'status' => 'True',
        ]);
    }

    private function generateImage()
    {
        // Create a dummy image
        $image = Image::canvas(300, 300, '#ccc');
        $text = 'Category Image';
        $image->text($text, 150, 150, function ($font) {
            $font->file(1); // Add path to a font file if necessary
            $font->size(24);
            $font->color('#000');
            $font->align('center');
            $font->valign('middle');
        });

        // Save the image
        $name_gen = hexdec(uniqid()) . '.jpg';
        $save_path = 'upload/category/' . $name_gen;
        $image->save(public_path($save_path));

        return $save_path;
    }
}
