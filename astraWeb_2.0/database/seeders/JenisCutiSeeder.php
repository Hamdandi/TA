<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class JenisCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('jenis_cutis')->insert([
            'jenis_cuti' => 'Tahunan',
            'jatah_cuti' => '12',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('jenis_cutis')->insert([
            'jenis_cuti' => 'Melahirkan',
            'jatah_cuti' => '90',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
