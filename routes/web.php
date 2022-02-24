<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'TreeController@index')->name('home');

// Page refresh status
Route::get('/refreshStatus/{value}', 'HomeController@refreshStatus')->name('refreshStatus');

Route::post('/addTitle', 'TreeController@addTitle')->name('addTitle');

Route::get('/deleteTreeTitle/{id}', 'TreeController@deleteTreeTitle')->name('deleteTreeTitle');

Route::get('/deleteTreeData/{id}', 'TreeController@deleteTreeData')->name('deleteTreeData');


Route::get('/clear', function() {
   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');      
   return back();
});

Route::get('/seed', function() {
   Artisan::call('db:seed');
   // Artisan::call('migrate:refresh --seed');     
   return back();
});

