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
    public function run()
    {
        $karyawans = [
            [
                'user_id' => 1,
                'nama_lengkap' => 'Reza',
                'posisi' => 'Karyawan',
                'nomor_hp' => '+62-811-555-019',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1990-05-15',
                'npk' => '1001562000',
            ],
            [
                'user_id' => 2,
                'nama_lengkap' => 'Ari',
                'posisi' => 'Karyawan',
                'nomor_hp' => '+62-897-555-29',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1990-05-15',
                'npk' => '1001562001',
            ],
            [
                'user_id' => 3,
                'nama_lengkap' => 'Dimas',
                'posisi' => 'Karyawan',
                'nomor_hp' => '62-812-555-750',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1990-05-15',
                'npk' => '1001562002',
            ],
            [
                'user_id' => 4,
                'nama_lengkap' => 'Intan',
                'posisi' => 'Karyawan',
                'nomor_hp' => '+62-878-555-815',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1995-12-20',
                'npk' => '1001562003',
            ],
            [
                'user_id' => 5,
                'nama_lengkap' => 'Suci',
                'posisi' => 'Karyawan',
                'nomor_hp' => '+62-838-555-505',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1988-03-10',
                'npk' => '1001562004',
            ],
            // Tambahkan entri tambahan sesuai dengan kebutuhan Anda
        ];

        DB::table('karyawans')->insert($karyawans);
    }
}
