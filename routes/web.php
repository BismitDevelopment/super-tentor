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
})->name('welcome');

Auth::routes(['verify'=>true]);


Route::prefix('home')->group(function(){
    
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('tryouthome', 'HomeController@tryouthome')->name('tryouthome');

    Route::prefix('tryouts')->group( function(){
        Route::get('free', 'TryoutController@indexFree')->name('home.tryouts.free');
        Route::get('premium', 'TryoutController@indexPremium')->name('home.tryouts.premium');
        Route::get('nasional', 'TryoutController@indexNasional')->name('home.tryouts.nasional');
    });
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
