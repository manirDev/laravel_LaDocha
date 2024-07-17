<?php


use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\ImageController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\OpenAIController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\frontend\AboutUsController;
use App\Http\Controllers\frontend\CategoryPageController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\FaqPageController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductPageController;
use App\Http\Controllers\frontend\ReferenceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*---------------------FRONTEND PAGES ROUTES START--------------------------------------*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/sendMessage', [ContactController::class, 'store'])->name('message.store');
Route::get('/reference', [ReferenceController::class, 'index'])->name('reference');
Route::get('/faq', [FaqPageController::class, 'index'])->name('faq');
Route::get('/category/{categoryID}/{slug}', [CategoryPageController::class, 'index'])->name('category.detail.page');
Route::get('/product/{productID}/{slug}', [ProductPageController::class, 'index'])->name('product.detail.page');

/*---------------------FRONTEND PAGES ROUTES END--------------------------------------*/

/*---------------------ADMIN ROUTES START--------------------------------------*/
//auth starts
Route::middleware('auth')->prefix('admin')->group(function(){
    //admin role starts
    Route::middleware([])->group(function(){

        #ADMIN HOME ROUTE
        Route::get('/', [AdminController::class, 'index'])->name('admin.home');

        #CATEGORY ROUTES
        Route::prefix('category')->group(function(){
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category');
            Route::get('add', [CategoryController::class, 'add'])->name('admin.category.add');
            Route::post('create', [CategoryController::class, 'create'])->name('admin.category.create');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
            Route::post('show/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
        });

        #PRODUCT ROUTES
        Route::prefix('product')->group(function (){
            Route::get('/', [ProductController::class, 'index'])->name('admin.product');
            Route::get('add', [ProductController::class, 'add'])->name('admin.product.add');
            Route::post('create', [ProductController::class, 'create'])->name('admin.product.create');
            Route::post('store', [ProductController::class, 'store'])->name('admin.product.store');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
            Route::post('update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
            Route::delete('delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
            Route::get('show', [ProductController::class, 'show'])->name('admin.product.show');
        });
        #IMAGE ROUTES
        Route::prefix('image')->group(function (){
            Route::get('create/{product_id}', [ImageController::class, 'create'])->name('admin.image.add');
            Route::post('store/{product_id}', [ImageController::class, 'store'])->name('admin.image.store');
            Route::delete('delete/{id}', [ImageController::class, 'destroy'])->name('admin.image.delete');
            Route::get('show', [ImageController::class, 'show'])->name('admin.image.show');
        });

        #MESSAGES ROUTES
        Route::prefix('message')->group(function (){
            Route::get('/', [MessageController::class, 'index'])->name('admin.message');
            Route::get('edit/{id}', [MessageController::class, 'edit'])->name('admin.message.edit');
            Route::post('update/{id}', [MessageController::class, 'update'])->name('admin.message.update');
            Route::delete('delete/{id}', [MessageController::class, 'destroy'])->name('admin.message.delete');
            Route::get('show', [MessageController::class, 'show'])->name('admin.message.show');
        });
        #FAQ ROUTES
        Route::prefix('faq')->group(function (){
            Route::get('/', [FaqController::class, 'index'])->name('admin.faq');
            Route::get('add', [FaqController::class, 'add'])->name('admin.faq.add');
            Route::get('create', [FaqController::class, 'create'])->name('admin.faq.create');
            Route::post('store', [FaqController::class, 'store'])->name('admin.faq.store');
            Route::get('edit/{id}', [FaqController::class, 'edit'])->name('admin.faq.edit');
            Route::post('update/{id}', [FaqController::class, 'update'])->name('admin.faq.update');
            Route::delete('delete/{id}', [FaqController::class, 'destroy'])->name('admin.faq.delete');
            Route::get('show', [FaqController::class, 'show'])->name('admin.faq.show');
        });


        #SETTING ROUTES
        Route::prefix('setting')->group(function (){
            Route::get('/', [SettingController::class, 'index'])->name('admin.setting');
            Route::post('update', [SettingController::class, 'update'])->name('admin.setting.update');
        });


        #openAI
        Route::get('/open-ai', [OpenAIController::class, 'index'])->name('admin.open-ai');
        Route::post('/generate-product-details', [OpenAIController::class, 'generateProductDetails'])->name('admin.openAi.gen');

    });//admin role ends

});//auth ends

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/loginCheck', [AdminController::class, 'loginCheck'])->name('admin.loginCheck');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
/*---------------------ADMIN ROUTES END--------------------------------------*/

Route::get('/test', function (){
    return "Hello Babe";
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
