<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    #getParentTree function to be reached in everywhere
    protected $appends = ['getSetting', 'getTag'];
    public static function getSetting(){
        $setting = Setting::select('id','title', 'company', 'email', 'description', 'phone',
                                            'address', 'keywords', 'facebook', 'instagram',
                                            'twitter', 'youtube', 'fax')->first();
        return $setting;
    }
    public static function getTag(){
        $tags = Product::select('slug')->latest()->limit(5)->inRandomOrder()->get();
        return $tags;
    }
    public static function categoryList(){
        return Category::where('parent_id',0)->with('children')->get();
    }

    function getLatestProductsByCategory($categoryName, $limit)
    {
        // Retrieve the category with its children
        $category = Category::where('title', $categoryName)->with('children')->first();

        if (!$category) {
            return collect(); // Return an empty collection if category not found
        }

        // Get category IDs including children
        $categoryIds = collect([$category->id])->merge($category->children->pluck('id'));

        // Retrieve the products along with their categories and children categories
        return Product::with(['category' => function ($query) {
            $query->with('children');
        }])
            ->whereIn('category_id', $categoryIds)
            ->latest()
            ->limit($limit)
            ->get();
    }
    public function index (){
        $All_latest = Product::select('id', 'title', 'image', 'description', 'price', 'slug')->latest()->limit(7)->get();
        $Clothing_latest = $this->getLatestProductsByCategory('Clothing', 7);
        $Electronics_latest =  $this->getLatestProductsByCategory('Electronics', 7);
        $Shoes_latest =  $this->getLatestProductsByCategory('Shoes', 7);

        $featured = Product::select('id', 'title', 'image', 'description', 'price', 'slug')->where('price','>','400')->limit(6)->inRandomOrder()->get();
        $bestSeller = Product::select('id', 'title', 'image', 'description', 'price', 'slug')->where('price','<', '400')->limit(12)->inRandomOrder()->get();
        $arrivals = Product::select('id', 'title', 'image', 'description', 'price', 'slug')->latest()->limit(6)->inRandomOrder()->get();
        $specialDeal = Product::select('id', 'title', 'image', 'description', 'price', 'slug')->latest()->limit(6)->inRandomOrder()->get();
        $specialOffer = Product::select('id', 'title', 'image', 'description', 'price', 'slug')->latest()->limit(6)->inRandomOrder()->get();
        $hotDeal = Product::select('id', 'title', 'image', 'description', 'price', 'slug')->latest()->limit(3)->inRandomOrder()->get();
        $hero = Product::select('id', 'title', 'image', 'description', 'price', 'slug')->latest()->limit(3)->get();
        $menFashion = Product::select('id', 'slug', 'image')->latest()->first();
        $womenFashion = Product::select('id', 'category_id', 'image', 'slug')->latest()->limit(2)->get();

        //$categories = Category::select('id', 'title', 'image', 'description')->where('parent_id','>',1)->limit(6)->inRandomOrder()->get();
        $data = [
            'All_latest'=>$All_latest,
            'Clothing_latest'=>$Clothing_latest,
            'Electronics_latest'=>$Electronics_latest,
            'Shoes_latest'=>$Shoes_latest,
            'featured' => $featured,
            'bestSeller'=>$bestSeller,
            'arrivals'=>$arrivals,
            'specialDeal'=>$specialDeal,
            'specialOffer'=>$specialOffer,
            'hotDeal'=>$hotDeal,
            'hero'=>$hero,
            'menFashion'=>$menFashion,
            'womenFashion'=>$womenFashion,
        ];

        return view('frontend.pages.index', $data);
    }
}
