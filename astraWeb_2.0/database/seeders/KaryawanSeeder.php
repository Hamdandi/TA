<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('karyawans')->insert([
            'user_id' => '1',
            'nama' => 'dandi',
            'posisi' => 'CEO',
            'nomor_hp' => '123456789',
            'alamat' => 'palangka raya',
            'jenis_kelamin' => 'laki-laki',
            'tempat_lahir' => 'palangka raya',
            'tanggal_lahir' => '2021-01-01',
            'nip' => 'admin',
        ]);

        DB::table('karyawans')->insert([
            'user_id' => '2',
            'nama' => 'popo',
            'posisi' => 'BOS',
            'nomor_hp' => '123456789',
            'alamat' => 'palangka raya',
            'jenis_kelamin' => 'laki-laki',
            'tempat_lahir' => 'palangka raya',
            'tanggal_lahir' => '2021-01-01',
            'nip' => 'adumin',
        ]);
    }
}
