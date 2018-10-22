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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login/custom',[
    'uses'=>'loginController@login',
    'as'=>'login.custom'
]);
/**
 * user authication 
 */
Route::group(['middleware'=>'auth'], function(){
    Route::get('/home',function(){
      return view('home');
    })->name('home');;
    Route::get('/dashbord',function(){
        return view('dashbord');
      })->name('dashbord');
});
