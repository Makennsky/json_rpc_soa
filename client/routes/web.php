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

Route::get('/', function () {
    return redirect(route('create.post'));
});
Route::get('create/post', 'PostController@create')->name('create.post');
Route::get('show/post', 'PostController@show')->name('show.post');
Route::post('store/post', 'PostController@store')->name('store.post');
Route::post('get/post', 'PostController@get')->name('get.post');
