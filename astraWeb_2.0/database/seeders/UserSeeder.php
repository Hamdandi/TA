<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
                'username' => 'Reza',
                'email' => 'Reza476@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'hrd',
                'is_active' => 1,
            ],
            [
                'username' => 'Ari',
                'email' => 'Ari@gmail.com',
                'password' => Hash::make('adumin'),
                'role' => 'hrd',
                'is_active' => 1,
            ],
            [
                'username' => 'dimas',
                'email' => 'dimas@gmail.com',
                'password' => Hash::make('dimas123'),
                'role' => 'hrd',
                'is_active' => 1,
            ],
            [
                'username' => 'intan',
                'email' => 'intan@gmail.com',
                'password' => Hash::make('intan123'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
            [
                'username' => 'suci',
                'email' => 'suci@gmail.com',
                'password' => Hash::make('suci123'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
            [
                'username' => 'bambang effendi',
                'email' => 'B.effendi@gmail.com',
                'password' => Hash::make('suci123'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
            [
                'username' => 'Yaman',
                'email' => 'yaman@gmail.com',
                'password' => Hash::make('suci123'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
            [
                'username' => 'dwi kurniawan',
                'email' => 'Dwi.K@gmail.com',
                'password' => Hash::make('suci123'),
                'role' => 'kepala cabang',
                'is_active' => 1,
            ],
            [
                'username' => 'Muhammad Nasir',
                'email' => 'nasir@gmail.com',
                'password' => Hash::make('suci123'),
                'role' => 'HRD',
                'is_active' => 1,
            ],
            // Tambahkan entri tambahan sesuai kebutuhan Anda
        ];

        DB::table('users')->insert($users);
    }
}
