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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('questions', 'QuestionController@index')->name('questions.index');
Route::get('questions/create', 'QuestionController@create')->name('questions.create');
Route::post('questions/store', 'QuestionController@store')->name('questions.store');
Route::get('/questions/{slug}', 'QuestionController@show')->name('questions.show');
