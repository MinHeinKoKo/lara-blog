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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\Testing;
use App\Http\Controllers\PageController;

Route::get('/',[PageController::class,"index"])->name("page.index");

Route::get("/detail/{slug}",[PageController::class,'detail'])->name("page.detail");

Route::get("/cate/{slug}",[PageController::class, "byCategoryPost"])->name("page.category");

Route::get('/detail-pdf/{slug}',[PageController::class,'pdfDownload'])->name("page.pdf");

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/test', [HomeController::class, 'test'])->name('test');

Route::middleware('auth')->prefix("dashboard")->group(function (){

    Route::resource('/category',CategoryController::class);

    Route::resource('/post', PostController::class);

    Route::resource('/photo', \App\Http\Controllers\PhotoController::class);

    Route::resource('/user', \App\Http\Controllers\UserController::class);
});

