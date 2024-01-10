<?php

namespace App\Imports;

use App\Models\rekap_presensi;
use App\Models\RekapPresensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RekapPresensiImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (!isset($row['karyawan_id'])) {
            // Anda bisa menangani baris tanpa karyawan_id sesuai kebutuhan
            // Misalnya dengan melewatinya atau mencatat log kesalahan
            return null;
        }

        return new rekap_presensi([
            'karyawan_id' => $row['karyawan_id'],
            'status'      => $row['status'],
            'tanggal'     => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal']),
        ]);
    }
}
