<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'Free User 1',
            'email' => 'free1@tentor.com',
            'role_id' => '2',
            'password' => bcrypt('free1free1'),
            'remember_token' => Str::random(60),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Free User 2',
            'email' => 'free2@tentor.com',
            'role_id' => '2',
            'password' => bcrypt('free2free2'),
            'remember_token' => Str::random(60),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Premium User 1',
            'email' => 'premium1@tentor.com',
            'role_id' => '3',
            'password' => bcrypt('pre1mium1'),
            'remember_token' => Str::random(60),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Premium User 2',
            'email' => 'premium2@tentor.com',
            'role_id' => '3',
            'password' => bcrypt('pre2mium2'),
            'remember_token' => Str::random(60),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('simulations')->insert([
            'user_id'=>2,
            'paket_id'=>1,
            'skor_tiu'=>150,
            'skor_twk'=>150,
            'skor_tkp'=>150,
            'total_skor'=>450,
            'status'=>'Lulus',
            'durasi_ujian'=>'01:30:00',
            'array_jawaban_twk' => '["-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-"]',
            'array_jawaban_tiu' => '["-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-"]',
            'array_jawaban_tkp' => '["-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('simulations')->insert([
            'user_id'=>3,
            'paket_id'=>1,
            'skor_tiu'=>100,
            'skor_twk'=>100,
            'skor_tkp'=>100,
            'total_skor'=>300,
            'status'=>'Tidak Lulus',
            'durasi_ujian'=>'00:30:00',
            'array_jawaban_twk' => '["-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-"]',
            'array_jawaban_tiu' => '["-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-"]',
            'array_jawaban_tkp' => '["-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
