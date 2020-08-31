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
Route::get('/questions', 'FormController@questions')->name('questions');
Route::post('/submit_form', 'FormController@sendAnswer')->name('submit_form');
Route::get('/{slug}$', 'FormController@answer')->name('answers_page');
Route::post('/{slug}$', 'FormController@answersByUser')->name('get_user_answers');

//Admin routes
Auth::routes();
Route::get('/administration', 'HomeController@index')->name('administration');
Route::get('/administration/answers', 'HomeController@answers')->name('answers');
Route::get('/administration/stats', 'HomeController@statsData')->name('stats');
