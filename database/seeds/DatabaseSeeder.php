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
        // $this->call(UsersTableSeeder::class);

        DB::table('paket_soals')->insert([
            'nama' => 'Paket 1',
            'jenis_tryout' => 1,
        ]);
        
        DB::table('soal_tius')->insert([
            'soal' => 'Apa?',
            'pilihan_1' => 'Apa kamu',
            'pilihan_2' => 'Apa anda',
            'pilihan_3' => 'Apa aku',
            'pilihan_4' => 'Apa dia',
            'jawaban' => 'Apa Kamu',
            'pembahasan' => 'Ini pembahasan y!',
            'paket_id' => 1,
        ]);
        DB::table('soal_tius')->insert([
            'soal' => 'Bagaimana?',
            'pilihan_1' => 'Bagaimana kamu',
            'pilihan_2' => 'Bagaimana anda',
            'pilihan_3' => 'Bagaimana aku',
            'pilihan_4' => 'Bagaimana dia',
            'jawaban' => 'Bagaimana Kamu',
            'pembahasan' => 'Ini pembahasan y!',
            'paket_id' => 1,
        ]);
        DB::table('soal_tius')->insert([
            'soal' => 'Siapa?',
            'pilihan_1' => 'Siapa kamu',
            'pilihan_2' => 'Siapa anda',
            'pilihan_3' => 'Siapa aku',
            'pilihan_4' => 'Siapa dia',
            'jawaban' => 'Siapa Kamu',
            'pembahasan' => 'Ini pembahasan y!',
            'paket_id' => 1,
        ]);

        DB::table('soal_twks')->insert([
            'soal' => 'Kenapa?',
            'pilihan_1' => 'Kenapa kamu',
            'pilihan_2' => 'Kenapa anda',
            'pilihan_3' => 'Kenapa aku',
            'pilihan_4' => 'Kenapa dia',
            'jawaban' => 'Kenapa Kamu',
            'pembahasan' => 'Ini pembahasan y!',
            'paket_id' => 1,
        ]);
        DB::table('soal_twks')->insert([
            'soal' => 'Ada Apa?',
            'pilihan_1' => 'Ada Apa kamu',
            'pilihan_2' => 'Ada Apa anda',
            'pilihan_3' => 'Ada Apa aku',
            'pilihan_4' => 'Ada Apa dia',
            'jawaban' => 'Ada Apa Kamu',
            'pembahasan' => 'Ini pembahasan y!',
            'paket_id' => 1,
        ]);
        DB::table('soal_twks')->insert([
            'soal' => 'Apa deh?',
            'pilihan_1' => 'Apa deh kamu',
            'pilihan_2' => 'Apa deh anda',
            'pilihan_3' => 'Apa deh aku',
            'pilihan_4' => 'Apa deh dia',
            'jawaban' => 'Apa deh Kamu',
            'pembahasan' => 'Ini pembahasan y!',
            'paket_id' => 1,
        ]);

        DB::table('soal_tkps')->insert([
            'soal' => 'Apa bro?',
            'pilihan_1' => 'Apa bro kamu',
            'pilihan_2' => 'Apa bro anda',
            'pilihan_3' => 'Apa bro aku',
            'pilihan_4' => 'Apa bro dia',
            'jawaban' => 'Apa bro Kamu',
            'pembahasan' => 'Ini pembahasan y!',
            'paket_id' => 1,
        ]);

        DB::table('soal_tkps')->insert([
            'soal' => 'Manusia?',
            'pilihan_1' => 'Manusia Apa kamu',
            'pilihan_2' => 'Manusia Apa anda',
            'pilihan_3' => 'Manusia Apa aku',
            'pilihan_4' => 'Manusia Apa dia',
            'jawaban' => 'Manusia Apa Kamu',
            'pembahasan' => 'Ini pembahasan y!',
            'paket_id' => 1,
        ]);
        DB::table('soal_tkps')->insert([
            'soal' => 'Apa?',
            'pilihan_1' => 'Apa kamu',
            'pilihan_2' => 'Apa anda',
            'pilihan_3' => 'Apa aku',
            'pilihan_4' => 'Apa dia',
            'jawaban' => 'Apa Kamu',
            'pembahasan' => 'Ini pembahasan y!',
            'paket_id' => 1,
        ]);
    }
}
