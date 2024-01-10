<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekap_presensi extends Model
{
    use HasFactory;

    protected $fillable = ['karyawan_id', 'status', 'tanggal'];

    public function karyawan()
    {
        return $this->belongsTo(karyawan::class);
    }
}
