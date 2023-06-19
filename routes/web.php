<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;

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



Auth::routes();


// Routes for public site...
Route::get('/search',[SearchController::class,'search'])->name('search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(BlogController::class)->group(function()
{
Route::get('/','master')->name('master');
Route::get('index','index')->name('index');
Route::get('about','about')->name('about');
Route::get('contact','contact')->name('contact');

});

// Route For Auth site...
Route::group(['middleware' => 'auth'], function() {
    Route::resource('post', PostController::class);
    Route::resource('/users',UserController::class);
});
