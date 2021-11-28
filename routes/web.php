<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MainController;
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

Route::get('/', [HomepageController::class, 'index'])->name('homepage');



Route::group(['middleware' =>['auth:sanctum', 'verified'] ], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('categories/trash', [CategoryController::class, 'showTrash'])->name('categories.trash');
    Route::resource('categories', CategoryController::class);
    Route::get('categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::get('categories/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::resource('articles', ArticleController::class);
});




