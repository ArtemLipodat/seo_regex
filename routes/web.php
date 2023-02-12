<?php

use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\UploadPost;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/login_form', function () {
    return view('auth.login_form');
});
Route::get('/register_form', function () {
    return view('auth.register');
});

Route::middleware('auth')->get('/favorite/{id?}', [FavoritesController::class, 'index'])->name('favorite');


Route::middleware('auth')->get('upload', function () {
    return view('upload');
})->name('upload');

Route::post('upload/add', [UploadPost::class, 'add'])->name('add');

Auth::routes();
