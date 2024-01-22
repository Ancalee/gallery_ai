<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/post-list',[PostController::class,'postList'])->name('post.list');
Route::post('/like-post/{id}',[PostController::class,'likePost'])->name('like.post');
Route::post('/unlike-post/{id}',[PostController::class,'unlikePost'])->name('unlike.post');
Route::middleware(['role:admin'])->group(function () {

  Route::get('/dashboard', [HomeController::class, 'admin'])->name('dashboard');
  Route::resource('gallery', GalleryController::class)
    ->except(['create', 'index']);
});

Route::middleware('role:operator')->get('/operator', [HomeController::class, 'operator'])->name('operator');


Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');
