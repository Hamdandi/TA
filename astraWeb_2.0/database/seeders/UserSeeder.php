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
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role' => 'hrd',
            'is_active' => '1',
        ]);

        DB::table('users')->insert([
            'username' => 'adumin',
            'email' => 'adumin@adumin.com',
            'password' => Hash::make('adumin'),
            'role' => 'hrd',
            'is_active' => '1',
        ]);
    }
}
