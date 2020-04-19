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
        'keunggulan_data' => [
            [
                'img' => '/img/svg-landing/papan.svg',
                'title' => 'Soal Hots dan ter-update',
                'content' => 'Soal dan Pembahasan yang telah dipersiapkan oleh SUPERTENTOR khusus untuk seluruh peserta Bimbingan untuk lebih mudah menyelesaikan soal ujian. Soal selalu di-update setiap tahun termasuk Model Soal HOTS dan TIDAK DIJUAL di pasaran.',
            ],
            [
                'img' => '/img/svg-landing/laptop.svg',
                'title' => 'Simulasi Berbasis CAT',
                'content' => 'Simulasi yang dibuat 100% SAMA dengan Ujian sesungguhnya. Terdiri dari 20 paket simulasi lengkap dengan statistik pengerjaannya yang dapat dikerjakan dimanapun dan kapanpun serta diperingkat secara nasional.'
            ],
            [
                'img' => '/img/svg-landing/badge.svg',
                'title' => 'Tentor Terbaik',
                'content' => 'Tentor terbaik yang secara khusus dipilih oleh Tim SUPERTENTOR dari akademisi dan profesional pendidikan yang berpengalaman di bidang yang diajarnya.'
            ],
            [
                'img' => '/img/svg-landing/pencil.svg',
                'title' => 'Bimbingan Sampai Lulus',
                'content' => 'Tim SUPERTENTOR memberikan komitmen untuk memandu siswa dalam belajar sampai dengan H-1 ujian. Tidak hanya itu, kami memberikan layanan tanya-jawab 24 Jam baik itu terkait akademik melalui wali kelas.'
            ],
        ],
        'program_data' => [
            [
                '20+ SIMULASI SKD SISTEM CAT',
                'PEMBAHASAN SIMULASI LENGKAP',
                'KISI-KISI + TIPS LULUS SKD',
                'MODUL TWK, TIU, DAN TKP',
                'PERANGKINGAN NASIONAL',
                'GRUP EKSKLUSIF TENTORING',
                'SIMULASI UPDATE SOAL HOTS!',
            ],
            [
                '100+ SIMULASI SBMPTN/UTBK SISTEM CAT',
                'PEMBAHASAN SIMULASI LENGKAP',
                'LAYANAN SAINTEN & SOSHUM',
                'MODUL MATERI SBMPTN/UTBK',
                'PERANGKINGAN NASIONAL',
                'GRUP EKSKLUSIF TENTORING' 

            ],
            [
                '50+ SIMULASI KEDINASAN SISTEM CAT',
                'PEMBAHASAN SIMULASI LENGKAP',
                'KISI-KISI + TIPS LULUS STAN',
                'MODUL MATERI TPA, TBI, TWK, TIU, TKP',
                'PERANGKINGAN NASIONAL',
                'GRUP EKSKLUSIF TENTORING', 
                'SIMULASI UPDATE SOAL HOTS!'
            ],
            
        ],
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
        'faq_data' => [
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
Route::get('/tryoutsoal', 'HomeController@tryoutsoal')->name('tryoutsoal');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
