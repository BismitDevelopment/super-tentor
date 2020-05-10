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
    include("../public/welcome-page-data.php"); //This is located in the public folder
    return view('welcome', $welcome_page_data);
})->name('welcome');

Auth::routes(['verify'=>true]);

Route::prefix('home')->name('home.')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('tryouthome', 'HomeController@tryouthome')->name('tryouthome');

    Route::prefix('tryouts')->name('tryouts.')->group( function(){
        
        Route::prefix('free')->name('free.')->group(function() {

            Route::get('/', 'TryoutController@indexFree')->name('index');
            Route::get('/{paket}', 'PaketSoalController@showFree')->name('show');
            
            Route::get('/{paket}/ujian', 'PaketSoalController@ujianFree')->name('ujian');
            Route::post('/{paket}/ujian', 'PaketSoalController@ujianFree')->name('ujianData');

        });

        Route::prefix('premium')->name('premium.')->group(function() {

            Route::get('/', 'TryoutController@indexPremium')->name('index');
            Route::get('/{paket}', 'PaketSoalController@showPremium')->name('show');

            Route::get('/{paket}/ujian', 'PaketSoalController@ujianPremium')->name('ujian');
            Route::post('/{paket}/ujian', 'PaketSoalController@ujianPremium')->name('ujianData');
        });

        Route::prefix('nasional')->name('nasional.')->group(function() {

            Route::get('/', 'TryoutController@indexNasional')->name('index');
            Route::post('/{paket}', 'PaketSoalController@showNasional')->name('show');

            Route::get('/{paket}/ujian', 'PaketSoalController@ujianPremium')->name('ujian');
            Route::post('/{paket}/ujian', 'PaketSoalController@ujianPremium')->name('ujianData');
        });
    });
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ranking', 'HomeController@ranking')->name('rangking');
// Route::get('/tryout-free', 'HomeController@tryout_free')->name('tryout-free');
// Route::get('/tryouthome', 'HomeController@tryouthome')->name('tryouthome');
// Route::get('/tryoutsoal', 'HomeController@tryoutsoal')->name('tryoutsoal');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
