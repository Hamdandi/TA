<?php

namespace App\Imports;

use App\Models\Presensi;
use App\Models\rekap_presensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;

class RekapPresensiImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $attendances = [];

        for ($i = 1; $i <= 31; $i++) {
            $date = Carbon::createFromDate(null, now()->month, $i); // assuming the current month
            if (isset($row["day$i"])) {
                $attendances[] = new rekap_presensi([
                    'name' => $row['nama'],
                    'date' => $date,
                    'status' => $row["day$i"], // 1 or 0
                ]);
            }
        }

        return $attendances;
    }
}
