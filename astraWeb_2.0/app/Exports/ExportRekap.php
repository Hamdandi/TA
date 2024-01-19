<?php

namespace App\Exports;

use App\Models\rekap_presensi;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportRekap implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return rekap_presensi::all();
    }
}
