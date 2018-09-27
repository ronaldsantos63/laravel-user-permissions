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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:is-admin']], function (){
    Route::get('users', function (){
        echo "Meus usuários";
    });
});

Route::get('posts/{post}/edit', 'PostController@edit');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
