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

Route::group(['middleware' => ['role:Administrador|Normal|Coordinador']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});

// Route::resource('usuarios', 'UserController');
Route::group(['middleware' => ['role:Administrador|Normal']], function() {
    Route::resource('usuarios', 'UserController');
});

Route::group(['middleware' => ['role:Administrador|Normal']], function() {
    Route::resource('coordinadores', 'CoordinatorController');
});

Route::group(['middleware' => ['role:Administrador|Normal|Coordinador']], function() {
    Route::resource('estudiantes', 'StudentController');
});