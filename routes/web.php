<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\TagController;
use App\Http\Controllers\Frontend\PostController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ____Frontend Route_____

Route::get('/', [UserController::class, 'index']);
Route::get('/category', [UserController::class, 'category']);
Route::get('/single/{slug}', [UserController::class, 'single']);

// Route::get('/', function () {
//     return view('frontend.index');
// });
// Route::get('/category', function () {
//     return view('frontend.category');
// });
// Route::get('/single', function () {
//     return view('frontend.single');
// });


// ____Backend Route_____

Route::get('/super-admin', function () {
    return view('admin.deshboard.index');
})->name('super.admin');

Route::resource('/category', CategoryController::class);
Route::resource('/tag', TagController::class);
Route::resource('/post', PostController::class);
