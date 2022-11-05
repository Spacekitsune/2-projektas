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
// Facebook Login URL
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', 'App\Http\Controllers\FaceBookController@loginUsingFacebook')->name('login');
    Route::get('callback', 'App\Http\Controllers\FaceBookController@callbackFromFacebook')->name('callback');
});


// Google URL
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', 'App\Http\Controllers\GoogleController@loginWithGoogle')->name('login');
    Route::any('callback', 'App\Http\Controllers\GoogleController@callbackFromGoogle')->name('callback');
});

Auth::routes();
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');


Route::prefix('projects')->group(function () {

    Route::get('', 'App\Http\Controllers\ProjectController@index')->name('project.index');
    Route::post('store', 'App\Http\Controllers\ProjectController@store')->name('project.store');
    Route::get('show/{project}', 'App\Http\Controllers\ProjectController@show')->name('project.show');
    Route::get('showAjax/{project}', 'App\Http\Controllers\ProjectController@showAjax')->name('project.showAjax');
    Route::post('update/{project}', 'App\Http\Controllers\ProjectController@update')->name('project.update');
    Route::post('destroy/{project}', 'App\Http\Controllers\ProjectController@destroy')->name('project.destroy');
    Route::post('destroyWithTasks/{project}', 'App\Http\Controllers\ProjectController@destroyWithTasks')->name('project.destroyWithTasks');
   
    Route::post('storeTask', 'App\Http\Controllers\TaskController@store')->name('project.storeTask');
    Route::get('showTask/{task}', 'App\Http\Controllers\TaskController@showAjax')->name('project.showTask');
    Route::post('updateTask/{task}', 'App\Http\Controllers\TaskController@update')->name('project.updateTask');
    Route::post('destroyTask/{task}', 'App\Http\Controllers\TaskController@destroy')->name('task.destroyTask');
    Route::get('search', 'App\Http\Controllers\ProjectController@search')->name('project.search');
});

