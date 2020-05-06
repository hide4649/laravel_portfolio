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
Route::get('/', 'PostsController@index');
Route::post('/posts/{post}/comments', 'CommentsController@store')->where('post', '[0-9]+');
Route::get('/posts/{post}', 'PostsController@show')->where('post', '[0-9]+')->name('show');
Route::get('/posts/{post}/editpost', 'PostsController@editpost')->where('post', '[0-9]+')->name('editpost');
Route::delete('/posts/{post}/comments/{comment}', 'CommentsController@destroy')->where('post', '[0-9]+');
Route::post('/posts', 'PostsController@store')->name('store');
Route::patch('/posts/{post}', 'PostsController@update')->where('post', '[0-9]+')->name('postUpdate');
Route::delete('/posts/{post}', 'PostsController@destroy')->name('delete');
Route::get('/users/{user}', 'UserController@mypage')->where('user', '[0-9]+')->name('mypage');
Route::get('/users/{user}/editprofile', 'UserController@editprofile')->where('user', '[0-9]+')->name('editprofile');
Route::patch('/user/{user}/', 'UserController@profileUpdate')->where('user', '[0-9]+')->name('profileUpdate');
Route::get('/posts/post', 'PostsController@post')->name('post');
Route::get('/categories/html', 'CategoriesController@html')->name('html');
Route::get('/categories/css', 'CategoriesController@css')->name('css');
Route::get('/posts/search', 'PostsController@search')->name('search');
Route::get('/categories/js', 'CategoriesController@js')->name('js');
Auth::routes(['verify' => 'true']);
Route::get('/home', 'HomeController@index')->name('home');

