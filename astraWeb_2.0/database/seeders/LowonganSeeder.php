<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('lowongans')->insert([
            'nama_lowongan' => 'teknisi',
            'jenis_pekerjaan' => 'pegawai tetap',
            'deskripsi_pekerjaan' => 'lorem ipsum dolor sit amet',
            'persyaratan' => 'lorem ipsum dolor sit amet',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
