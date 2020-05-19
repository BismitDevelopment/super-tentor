<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Premium User 1',
            'email' => 'premium1@tentor.com',
            'role_id' => '3',
            'password' => bcrypt('pre1mium1'),
            'remember_token' => Str::random(60),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
