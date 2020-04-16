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
    return view('welcome', [
        'carousel_data' => [
            [
                'name' => 'Huda',
                'age' => 20,
                'message' => '“SuperTentor adalah program bimbingan untuk CPNS. Gue sekarang suka makan indomie rebus bungkus”',
                'kantor' => 'KEMENKES',
                'img_link' => '/img/profile.jpg'
            ],
            [
                'name' => 'Huda',
                'age' => 20,
                'message' => '“SuperTentor adalah program bimbingan untuk CPNS. Gue sekarang suka makan indomie rebus bungkus”',
                'kantor' => 'KEMENKES',
                'img_link' => '/img/profile.jpg'
            ],
            [
                'name' => 'Huda',
                'age' => 20,
                'message' => '“SuperTentor adalah program bimbingan untuk CPNS. Gue sekarang suka makan indomie rebus bungkus”',
                'kantor' => 'KEMENKES',
                'img_link' => '/img/profile.jpg'
            ],
        ],
        'info_data' => [
            [
                'title' => 'Siapa yang cocok Ikut Bimbingan SuperTentor?',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
            ],
            [
                'title' => 'Siapa yang cocok Ikut Bimbingan SuperTentor?',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
            ],
            [
                'title' => 'Siapa yang cocok Ikut Bimbingan SuperTentor?',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
            ],
            [
                'title' => 'Siapa yang cocok Ikut Bimbingan SuperTentor?',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
            ],
            [
                'title' => 'Siapa yang cocok Ikut Bimbingan SuperTentor?',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
            ],
        ]
    ]);
})->name('welcome');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tryout-free', 'HomeController@tryout_free')->name('tryout-free');
Route::get('/tryouthome', 'HomeController@tryouthome')->name('tryouthome');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
