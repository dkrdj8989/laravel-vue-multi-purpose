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


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('{path}','HomeController@index')->where( 'path', '([A-z\d\-/_.]+)?' ); // vue 라우터 때문에 entry를 만들어줘야함
});
