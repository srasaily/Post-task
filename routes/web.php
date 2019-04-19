<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('posts')->group(function(){
    Route::get('/','PostController@index')->name('posts.index');
    Route::get('/create', 'PostController@create')->name('posts.create');
    Route::post('/','PostController@store')->name('posts.store');
    Route::get('/{post}/edit','PostController@edit')->name('posts.edit');
    Route::patch('/{post}', 'PostController@update')->name('posts.update');
    Route::get('/{post}', 'PostController@show')->name('posts.show');
    Route::delete('/{post}', 'PostController@destroy')->name('posts.destroy');

//    Route::get('/comments/create', 'CommentController@create')->name('comments.create');
    Route::post('/comments/{post}', 'CommentController@store')->name('comments.store');
    Route::post('/comment-delete', 'CommentController@destroy')->name('comments.destroy');

});

