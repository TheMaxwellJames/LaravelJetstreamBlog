<?php

use Illuminate\Support\Facades\Route;
use App\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PagesController;

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

// Route::get('/', function () {
//     return view('Pages.index');
// });


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\PostController@index', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/','App\Http\Controllers\PagesController@index'); 
Route::resource('posts', 'App\Http\Controllers\PostController');

