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

Route::get('/', 'HomeController@index');
Route::get('my-tests', 'HomeController@tests')->name('myTests.index');
Route::get('my-tests/{test}', 'HomeController@test')->name('myTests.show');


Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('topics', 'TopicController');

    Route::group(['prefix' => 'questions/{question}'], function () {
        Route::resource('options', 'OptionController');
    });
    Route::resource('questions', 'QuestionController');
    Route::patch('questions/{question}', 'QuestionController@homologated')->name('questions.homologated');
    // Route::resource('tests', 'TestController');
});

Route::middleware('auth')->resource('tests', 'TestController');