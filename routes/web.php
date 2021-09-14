<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
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
Route::view('blogs', 'blogs');

// Admin
Route::prefix('dashboard')->group(function () {
  Route::view('/', 'admin.pages.home.index');
  Route::resource('/article', ArticleController::class);
});