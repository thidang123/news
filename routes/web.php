<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', [AdminController::class, "loginAdmin"]);


Route::group(["prefix" => '/','as'=>'categories.'], function () {
	Route::get('/contact', [SiteController::class, "contact"]);
	Route::get('/home', [SiteController::class, "home"]);
	Route::get('/regular', [SiteController::class, "regular"]);
	Route::get('/blog', [SiteController::class, "blog"]);
	Route::get('/ds', [SiteController::class, 'ds']);
});

Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
	Route::get('', [UserController::class, 'index'])->name('index');
	Route::get('create', [UserController::class, 'create'])->name('create');
	Route::post('create', [UserController::class, 'store'])->name('store');
	Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
	Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
	Route::put('edit/{user}', [UserController::class, 'update'])->name('update');
    Route::get('api',[UserController::class,'api'])->name('api');
});

Route::group(['prefix'=>'posts','as'=>'post.'],function () {
    Route::get('', [PostController::class, 'index'])->name('index');
    Route::get('create', [PostController::class, 'create'])->name('create');
    Route::post('store', [PostController::class, 'store'])->name('store');
    //upload anh
});
Route::group(['prefix'=>'users','as'=>'user.'],function(){
//For storing an image
    Route::post('storeimg',[UserController::class,'storeImage'])
        ->name('storeimg');
//For showing an image
    Route::get('viewimg',[UserController::class,'viewImage'])->name('viewimg');
});
Route::get('login',[LoginController::class,'login'])->name('login');




