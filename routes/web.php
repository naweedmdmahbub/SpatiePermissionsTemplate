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


Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
    Route::post('/users/delete/{id}', 'UserController@delete');
    Route::resource('roles', 'RoleController');
    Route::post('/roles/delete/{id}', 'RoleController@delete');
});

//Route::resource('users', 'UserController')->middleware('web');
//Route::post('/users/delete/{id}', 'UserController@delete')->middleware('web');

Route::get('/dashboard','HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
