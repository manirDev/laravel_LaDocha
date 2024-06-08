<?php


use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
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
        Route::get('category', [CategoryController::class, 'index'])->name('admin.category');
        Route::get('category/add', [CategoryController::class, 'add'])->name('admin.category.add');
        Route::post('category/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
        Route::post('category/show/{id}', [CategoryController::class, 'show'])->name('admin.category.show');

        #PRODUCT ROUTES
        #IMAGE ROUTES
        #MESSAGES ROUTES
        #FAQ ROUTES
        #SETTING ROUTES

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
