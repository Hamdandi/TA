<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuti extends Model
{
    use HasFactory;

    public function jenisCutis()
    {
        return $this->hasMany(jenis_cuti::class, 'karyawan_id');
    }

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
