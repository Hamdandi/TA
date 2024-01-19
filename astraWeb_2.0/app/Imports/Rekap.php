<?php

namespace App\Imports;

use App\Models\rekap_presensi;
use Maatwebsite\Excel\Concerns\ToModel;

class Rekap implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new rekap_presensi([
            //
            'name' => $row[0],
            'date' => $row[1],
            'status' => $row[2]
        ]);
    }
}
