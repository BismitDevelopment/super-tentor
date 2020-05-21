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
    Route::get('/{page?}', 'HomeController@index')->name('index');
    Route::get('tryouthome', 'HomeController@tryouthome')->name('tryouthome');

    Route::prefix('tryouts')->name('tryouts.')->group( function(){
        
        Route::prefix('free')->name('free.')->group(function() {

            Route::get('/', 'TryoutController@indexFree')->name('index');
            Route::get('/{paket}', 'PaketSoalController@showFree')->name('show');
            
            Route::get('/{paket}/ujian', 'PaketSoalController@ujianFree')->name('ujian');
            Route::post('/{paket}/ujian', 'PaketSoalController@ujianFree')->name('ujianData');
            Route::post('/{paket}/ujian/finish', 'PaketSoalController@finish')->name('finish');
            Route::get('/{paket}/ranking/{page?}', 'PaketSoalController@rankingFree')->name('ranking');
        });

        Route::middleware(['can:isPremium'])->prefix('premium')->name('premium.')->group(function() {

            Route::get('/', 'TryoutController@indexPremium')->name('index');
            Route::get('/{paket}', 'PaketSoalController@showPremium')->name('show');

            Route::get('/{paket}/ujian', 'PaketSoalController@ujianPremium')->name('ujian');
            Route::post('/{paket}/ujian', 'PaketSoalController@ujianPremium')->name('ujianData');
            Route::post('/{paket}/ujian/finish', 'PaketSoalController@finish')->name('finish');
            Route::get('/{paket}/ranking/{page?}', 'PaketSoalController@rankingPremium')->name('ranking');
        });

        Route::prefix('nasional')->name('nasional.')->group(function() {

            Route::get('/', 'TryoutController@indexNasional')->name('index');
            Route::get('/{paket}', 'PaketSoalController@showNasional')->name('show');

            Route::get('/{paket}/ujian', 'PaketSoalController@ujianNasional')->name('ujian');
            Route::post('/{paket}/ujian', 'PaketSoalController@ujianNasional')->name('ujianData');
            Route::post('/{paket}/ujian/finish', 'PaketSoalController@finish')->name('finish');
            Route::get('/{paket}/ranking/{page?}', 'PaketSoalController@rankingNasional')->name('ranking');

            Route::get('/{paket}/pembahasan/{simulation}', 'SimulationController@pembahasanNasional')->name('pembahasan');
            Route::post('/{paket}/pembahasan/{simulation}', 'SimulationController@pembahasanNasional')->name('pembahasanData');
        });
    });
});


// Route::get('/tryout-free', 'HomeController@tryout_free')->name('tryout-free');
// Route::get('/tryouthome', 'HomeController@tryouthome')->name('tryouthome');
// Route::get('/tryoutsoal', 'HomeController@tryoutsoal')->name('tryoutsoal');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
