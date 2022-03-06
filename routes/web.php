<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TreeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'TreeController@index')->name('home');

// Page refresh status
Route::get('/refreshStatus/{value}', 'HomeController@refreshStatus')->name('refreshStatus');
Route::post('/addTitle', 'TreeController@addTitle')->name('addTitle');
Route::post('/addParent', 'TreeController@addParent')->name('addParent');
Route::get('/deleteTreeTitle/{id}', 'TreeController@deleteTreeTitle')->name('deleteTreeTitle');
Route::get('/deleteTreeData/{id}', 'TreeController@deleteTreeData')->name('deleteTreeData');
Route::post('/addTitle', 'TreeController@addTitle')->name('addTitle');


// depency 
   $pages = ltrim(\Request::getRequestUri(), '/');

   Route::post($pages != 'register' ?  ($pages != 'login' ? ($pages != 'logout' ? $pages : '') : '') : '', 'TreeController@itrerate');

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

