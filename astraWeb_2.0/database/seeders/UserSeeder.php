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
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'hrd',
                'is_active' => 1,
            ],
            [
                'username' => 'Ade Sandika',
                'email' => 'ade@gmail.com',
                'password' => Hash::make('ade12345'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
            [
                'username' => 'Andri Pratama',
                'email' => 'andri@gmail.com',
                'password' => Hash::make('andri123'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
            [
                'username' => 'Andriyansyah',
                'email' => 'andriyansyah@gmail.com',
                'password' => Hash::make('andriyansyah123'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
            [
                'username' => 'Dian Sari Putra',
                'email' => 'dian@gmail.com',
                'password' => Hash::make('dian123'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
            [
                'username' => 'Habibi',
                'email' => 'habibi@gmail.com',
                'password' => Hash::make('habibi123'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
            [
                'username' => 'Irsyad Wafdhillah',
                'email' => 'irsyad@gmail.com',
                'password' => Hash::make('irsyad123'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
            [
                'username' => 'Febriansyah',
                'email' => 'febriyansyah@gmail.com',
                'password' => Hash::make('febriyansyah123'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
            [
                'username' => 'Khoiriyyah Rahmah Watie',
                'email' => 'watie@gmail.com',
                'password' => Hash::make('watie123'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
            [
                'username' => 'Erri Romadhona',
                'email' => 'erri@gmail.com',
                'password' => Hash::make('errir123'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
            [
                'username' => 'M.Aris Julianto',
                'email' => 'aris@gmail.com',
                'password' => Hash::make('aris123'),
                'role' => 'karyawan',
                'is_active' => 1,
            ],
        ];

        DB::table('users')->insert($users);
    }
}
