<?php


use App\Http\Controllers\admin\AdminController;
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
Route::middleware([])->prefix('admin')->group(function(){
    //admin starts
    Route::middleware([])->group(function(){

        #ADMIN HOME ROUTE
        Route::get('/', [AdminController::class, 'index'])->name('admin.home');

        #CATEGORY ROUTES
        #PRODUCT ROUTES
        #IMAGE ROUTES
        #MESSAGES ROUTES
        #FAQ ROUTES
        #SETTING ROUTES

    });//admin ends

});//auth ends

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/loginCheck', [AdminController::class, 'loginCheck'])->name('admin.loginCheck');
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
