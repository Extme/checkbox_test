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
    //return view('welcome');
//});
Route::get('/','ObjectController@index');
Route::get('/tree','ObjectController@showTree');
Route::get('/getData','ObjectController@getHead')->name('getHead');
Route::post('/showSubordinates','ObjectController@showSubordinates')->name('showSubordinates');


//link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/
          //css/bootstrap.min.css"  />
//<script src="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/js/bootstrap.min.js"></script>