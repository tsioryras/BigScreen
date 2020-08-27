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
Route::get('/questions', 'FormController@getQuestions')->name('question_list');

//Admin routes
Auth::routes();
Route::get('/administration', 'HomeController@index')->name('administration');
Route::get('/administration/questions', 'HomeController@question')->name('questions');
Route::get('/administration/answers', 'HomeController@answer')->name('answers');
Route::get('/administration/users', 'HomeController@users')->name('users');
