<?php

use App\Mail\NewUserWelcomeMail;
use App\Post;
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

Auth::routes();

Route::get('/', 'PostsController@index');

Route::post('/p/{post}/comment', 'CommentController@store');
Route::post('/p/{post}/comment/{comment}', 'CommentController@delete');


Route::get('/p/create', 'PostsController@create')->name('posts.create');
Route::post('/p', 'PostsController@store');
Route::get('p/{post}', 'PostsController@show');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::post('/follow/{user}', 'FollowsController@store');
