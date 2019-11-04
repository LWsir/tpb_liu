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

//Route::get('/', function () {
//
////    return view('welcome');
//});


Route::get('/learn',function (){
    return "learning";
});

Route::get('/oopLearn','TestController@oopLearn');

Route::get('/hashTable','TestController@hashTable');

Route::get('/awayFromDay','TestController@awayFromDay');

Route::get('/getIp','TestController@getQuery');