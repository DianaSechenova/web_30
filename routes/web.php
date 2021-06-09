<?php

use App\Http\Controllers;
use App\Http\Controllers\IndexController;

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

Route::get('/', IndexController::class)->name('index');

Route::get('/about', '\App\Http\Controllers\SimplePageController@about')->name('about');

Route::get('/services', '\App\Http\Controllers\SimplePageController@services')->name('services');

Route::get('/contacts', '\App\Http\Controllers\SimplePageController@contacts')->name('contacts');

Route::get('/author/{key}',Controllers\PostByAuthorController::class )->name('post_by_author');

Route::get('/post/{id}',Controllers\SinglePostController::class)->name('single_post');

Route::post('/post/{id}',Controllers\SaveCommentController::class)->name('save_comment');

Route::get('/category/{key}',Controllers\PostByCategoryController::class)->name('post_by_category');

//Admin
Route::get('/admin/add_post', 'App\Http\Controllers\AdminPostsController@add')->name('add_post_get');
Route::post('/admin/add_post', 'App\Http\Controllers\AdminPostsController@save')->name('add_post_save');

Route::get('/admin/edit_post/{id}', 'App\Http\Controllers\AdminPostsController@edit')->name('edit_post_get');
Route::post('/admin/edit_post/{id}', 'App\Http\Controllers\AdminPostsController@edit_save')->name('edit_post_save');

//Auth
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
