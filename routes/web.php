<?php
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'cors'], function(){
    Route::resource('contacts','ContactController');
});
//Route::resource('contacts','ContactController');
