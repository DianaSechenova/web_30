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


