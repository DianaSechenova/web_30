<?php

use App\Http\Controllers;
use App\Http\Controllers\IndexController;

use Illuminate\Support\Facades\Mail;
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
Route::post('/admin/add_post', 'App\Http\Controllers\AdminPostsController@save')->name('add_post_post');

Route::get('/admin/edit_post/{id}', 'App\Http\Controllers\AdminPostsController@edit')->name('edit_post_get');
Route::post('/admin/edit_post/{id}', 'App\Http\Controllers\AdminPostsController@edit_save')->name('edit_post_post');

Route::get('/admin/admin_panel', 'App\Http\Controllers\AdminPostsController@delete')->name('admin_panel_get');
Route::delete('/admin/admin_panel', 'App\Http\Controllers\AdminPostsController@delete')->name('admin_panel_post');

Route::get('/404', function (){
    return view('404');
})->name('404');

//email subscription

Route::post('/subscription', Controllers\MailSubscriptionController::class)->name('subscription');

//Auth
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//cart actions
Route::get('/cart/add_to_cart/{id}', 'App\Http\Controllers\CartAction@add')->name('add_to_cart');
Route::get('/cart', 'App\Http\Controllers\CartAction@show')->name('cart');
Route::get('/cart/delete/{id}', 'App\Http\Controllers\CartAction@delete')->name('delete_from_cart');
Route::post('/cart/update', 'App\Http\Controllers\CartAction@update')->name('update_cart');


