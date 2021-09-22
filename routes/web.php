<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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

Route::view('/', 'index');
Route::view('about', 'about');
Route::view('services', 'services');
Route::get('blogs', [PageController::class, 'blogsPage']);
Route::get('blogs/{slug}', [PageController::class, 'detailBlogPage']);
Route::get('blogs/tag/{tag}', [PageController::class, 'blogsPageByTag']);
Route::get('blogs', [PageController::class, 'blogsPageByKeyword'])->name('blog.search');

// Admin
Route::prefix('dashboard')->group(function () {
  Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/user', UserController::class);
  });
  Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/article', ArticleController::class);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
  });
});

Route::middleware(['guest'])->group(function () {
  Route::get('login', [AuthController::class, 'index']);
  Route::post('login', [AuthController::class, 'authenticate'])->name('login');
});