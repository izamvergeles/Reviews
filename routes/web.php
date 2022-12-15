<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes(['verify' => true]);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/post', [App\Http\Controllers\HomeController::class, 'post'])->name('post');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


Route::get('/post/films', [App\Http\Controllers\HomeController::class, 'films'])->name('films');
Route::get('/post/record', [App\Http\Controllers\HomeController::class, 'records'])->name('records');
Route::get('/post/book', [App\Http\Controllers\HomeController::class, 'books'])->name('books');
// Route::get('logged', [App\Http\Controllers\SampleRouteController::class, 'logged'])->name('logged');


Route::resource('review', App\Http\Controllers\ReviewController::class);
Route::resource('user', App\Http\Controllers\HomeController::class);