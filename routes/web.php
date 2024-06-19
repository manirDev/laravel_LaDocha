<?php


use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ImageController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\frontend\HomeController;
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
        #FAQ ROUTES
        #SETTING ROUTES
        Route::prefix('setting')->group(function (){
            Route::get('/', [SettingController::class, 'index'])->name('admin.setting');
            Route::post('update', [SettingController::class, 'update'])->name('admin.setting.update');
        });


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
