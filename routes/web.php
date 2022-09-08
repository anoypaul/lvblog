<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\TagController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Models\Registration;

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



// ________Backend Route________

// Route::get('/super-admin', function () {
//     return view('admin.deshboard.index');
// })->name('super.admin');

// Route::get('/super-admin/user', function () {
//     return view('admin.user.edit');
// })->name('super.admin');

// Route::get('/super-admin', function () {
//     return view('admin.authentication.login');
// })->name('super.admin');
// Route::get('/super-admin/registration', function () {
//     return view('admin.authentication.registration');
// })->name('super.admin');

// ****** register start *****
Route::get('/login', [RegistrationController::class, 'login_page']);
Route::get('/super-admin/registration', [RegistrationController::class, 'registration']);
Route::post('/super-admin/registration/create', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/super-admin/login', [RegistrationController::class, 'login'])->name('login');
Route::get('/super-admin', [RegistrationController::class, 'index_page'])->name('super.admin');

// ****** register end *****

Route::resource('/category', CategoryController::class);
Route::resource('/tag', TagController::class);
Route::resource('/post', PostController::class);
