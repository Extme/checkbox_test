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
Route::POST('/insert','ObjectController@insert')->name('insert');
Route::POST('/delete','ObjectController@delete')->name('delete');
Route::POST('/selectRow','ObjectController@selectRow')->name('selectRow');
Route::POST('/selectColumn','ObjectController@selectColumn')->name('selectColumn');
Route::POST('/deSelectRow','ObjectController@deSelectRow')->name('deSelectRow');
Route::POST('/deSelectColumn','ObjectController@deSelectColumn')->name('deSelectColumn');
Route::POST('/selectAll','ObjectController@selectAll')->name('selectAll');
Route::POST('/deSelectAll','ObjectController@deSelectAll')->name('deSelectAll');


//link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/
          //css/bootstrap.min.css"  />
//<script src="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/js/bootstrap.min.js"></script>