<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LamaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('lamarans')->insert([
            'lowongan_id' => 1,
            'status' => 'menunggu',
            'nama_lengkap' => 'Rizky',
            'email' => 'rizk@gmail.com',
            'nomor_hp' => '081234567890',
            'alamat' => 'Jl. Raya',
            'jenis_kelamin' => 'laki-laki',
            'nama_sekolah' => 'SMK',
            'pendidikan' => 'SMA',
            'jurusan' => 'IPA',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2000-01-01',
            'status_pernikahan' => 'belum menikah',
            'akun_media' => 'https://www.instagram.com/rizky/',
            'resume' => 'https://www.instagram.com/rizky/',
            'foto' => 'https://www.instagram.com/rizky/',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
