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
        $lowongans = [
            [
                'nama_lowongan' => 'Teknisi',
                'jenis_pekerjaan' => 'Pegawai Tetap',
                'deskripsi_pekerjaan' => 'Perawatan dan perbaikan peralatan teknis.',
                'persyaratan' => 'Pengalaman minimal 2 tahun di bidang teknis, sertifikat keahlian terkait.',
            ],
            [
                'nama_lowongan' => 'Sales',
                'jenis_pekerjaan' => 'Kontrak',
                'deskripsi_pekerjaan' => 'Menjual produk dan layanan kepada pelanggan.',
                'persyaratan' => 'Kemampuan komunikasi yang baik, pengalaman di bidang penjualan.',
            ],
            [
                'nama_lowongan' => 'Mekanik',
                'jenis_pekerjaan' => 'Pegawai Tetap',
                'deskripsi_pekerjaan' => 'Memperbaiki dan merawat kendaraan.',
                'persyaratan' => 'Pengetahuan tentang otomotif, sertifikat mekanik.',
            ],
            [
                'nama_lowongan' => 'Administrasi',
                'jenis_pekerjaan' => 'Pegawai Tetap',
                'deskripsi_pekerjaan' => 'Mengelola dokumen dan tugas administratif lainnya.',
                'persyaratan' => 'Kemampuan mengelola dokumen, pengalaman administrasi.',
            ],
            [
                'nama_lowongan' => 'IT Support',
                'jenis_pekerjaan' => 'Kontrak',
                'deskripsi_pekerjaan' => 'Memberikan dukungan teknis dan pemeliharaan sistem IT.',
                'persyaratan' => 'Kemampuan teknis IT, pengalaman di bidang IT support.',
            ]
        ];

        foreach ($lowongans as $lowongan) {
            DB::table('lowongans')->insert(array_merge($lowongan, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
