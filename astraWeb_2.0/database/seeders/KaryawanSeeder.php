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
                'nama_lengkap' => 'admin',
                'posisi' => 'hrd',
                'nomor_hp' => '+62-811-555-019',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1990-05-15',
                'npk' => '1111',
            ],
            [
                'user_id' => 2,
                'nama_lengkap' => 'Ade Sandika',
                'posisi' => 'Karyawan',
                'nomor_hp' => '+62-897-555-29',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1990-05-15',
                'npk' => '225013',
            ],
            [
                'user_id' => 3,
                'nama_lengkap' => 'Andri Pratama',
                'posisi' => 'Karyawan',
                'nomor_hp' => '62-812-555-750',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1990-05-15',
                'npk' => '57323',
            ],
            [
                'user_id' => 4,
                'nama_lengkap' => 'Andriyansyah',
                'posisi' => 'Karyawan',
                'nomor_hp' => '+62-878-555-815',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1995-12-20',
                'npk' => '46708',
            ],
            [
                'user_id' => 5,
                'nama_lengkap' => 'Dian Sari Putra',
                'posisi' => 'Karyawan',
                'nomor_hp' => '+62-838-555-505',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1988-03-10',
                'npk' => '68659',
            ],
            [
                'user_id' => 6,
                'nama_lengkap' => 'Habibi',
                'posisi' => 'Karyawan',
                'nomor_hp' => '+62-838-555-505',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1988-03-10',
                'npk' => '8176',
            ],
            [
                'user_id' => 7,
                'nama_lengkap' => 'Irsyad Wafdhillah',
                'posisi' => 'Karyawan',
                'nomor_hp' => '+62-838-555-505',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1988-03-10',
                'npk' => '65254',
            ],
            [
                'user_id' => 8,
                'nama_lengkap' => 'FEBRIANSYAH',
                'posisi' => 'Karyawan',
                'nomor_hp' => '+62-838-555-505',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1988-03-10',
                'npk' => '31507',
            ],
            [
                'user_id' => 9,
                'nama_lengkap' => 'Khoiriyyah Rahma Watie',
                'posisi' => 'Karyawan',
                'nomor_hp' => '+62-838-555-505',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1988-03-10',
                'npk' => '69888',
            ],
            [
                'user_id' => 10,
                'nama_lengkap' => 'ERRI ROMADHONA',
                'posisi' => 'Karyawan',
                'nomor_hp' => '+62-838-555-505',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1988-03-10',
                'npk' => '48318',
            ],
            [
                'user_id' => 11,
                'nama_lengkap' => 'M. Aris Julianto',
                'posisi' => 'Karyawan',
                'nomor_hp' => '+62-838-555-505',
                'alamat' => 'Palemabang',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Palemabang',
                'tanggal_lahir' => '1988-03-10',
                'npk' => '32493',
            ],
        ];

        DB::table('karyawans')->insert($karyawans);
    }
}
