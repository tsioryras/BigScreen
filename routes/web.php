<?php

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

//Guests routes
Route::get('/', 'FormController@index')->name('index');
Route::get('/questions', 'FormController@questions')->name('question_list');
Route::get('/{token}', 'FormController@answers')->where(['token' => '[aA-zZ]+'])->name('answer');

//Admin routes
Auth::routes();
Route::get('/administration', 'HomeController@index')->name('administration');
Route::get('/administration/answers', 'HomeController@answers')->name('answers');
