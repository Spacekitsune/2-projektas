<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');


Route::prefix('projects')->group(function () {

    Route::get('', 'App\Http\Controllers\ProjectController@index')->name('project.index');
    Route::post('store', 'App\Http\Controllers\ProjectController@store')->name('project.store');
    Route::get('show/{project}', 'App\Http\Controllers\ProjectController@show')->name('project.show');
    Route::get('showAjax/{project}', 'App\Http\Controllers\ProjectController@showAjax')->name('project.showAjax');
    Route::post('update/{project}', 'App\Http\Controllers\ProjectController@update')->name('project.update');
    Route::post('destroy/{project}', 'App\Http\Controllers\ProjectController@destroy')->name('project.destroy');
});
