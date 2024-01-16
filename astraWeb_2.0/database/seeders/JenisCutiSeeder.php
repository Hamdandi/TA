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
    public function run()
    {
        $jenisCuti = [
            [
                'jenis_cuti' => 'Tahunan',
                'jatah_cuti' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_cuti' => 'Melahirkan',
                'jatah_cuti' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_cuti' => 'Pernikahan',
                'jatah_cuti' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_cuti' => 'Kelahiran',
                'jatah_cuti' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_cuti' => 'Kematian',
                'jatah_cuti' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_cuti' => 'Khitanan/Pembabtisan',
                'jatah_cuti' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_cuti' => 'Ujian Keserjanaan',
                'jatah_cuti' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_cuti' => 'Untuk Kepentingan',
                'jatah_cuti' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_cuti' => 'Nasional/Regional',
                'jatah_cuti' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('jenis_cutis')->insert($jenisCuti);
    }
}
