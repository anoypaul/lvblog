<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\TagController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\AdminUserController;
use App\Http\Controllers\Frontend\SeetingController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DashboardController;
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
Route::get('/categories/{slug}', [UserController::class, 'category']);
Route::get('/single/{slug}', [UserController::class, 'single']);

Route::get('/super-admin/about', [UserController::class, 'about']);
Route::get('/super-admin/contact', [UserController::class, 'contact']);
Route::post('/super-admin/contact-submit', [UserController::class, 'contact_submit']);


// ________Backend Route________


// ****** register start *****
Route::get('/login', [RegistrationController::class, 'login_page']);
Route::get('/super-admin/registration', [RegistrationController::class, 'registration']);
Route::post('/super-admin/registration/create', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/super-admin/login', [RegistrationController::class, 'login'])->name('login');
Route::get('/super-admin', [RegistrationController::class, 'index_page'])->name('super.admin');

// ****** register end *****

// ****** Admin User start *****
Route::get('/admin-user', [AdminUserController::class, 'index']);
Route::get('/admin-user/edit/{id}', [AdminUserController::class, 'edit']);
Route::post('/admin-user/update/{id}', [AdminUserController::class, 'update']);
Route::get('/admin-user/delete/{id}', [AdminUserController::class, 'delete']);

// ****** Admin User end *****


Route::resource('/dashboard', DashboardController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/tag', TagController::class);
Route::resource('/post', PostController::class);
Route::resource('/contact', ContactController::class);

Route::get('/super-admin/setting', [SeetingController::class, 'edit']);
Route::post('/super-admin/setting/update', [SeetingController::class, 'update']);


