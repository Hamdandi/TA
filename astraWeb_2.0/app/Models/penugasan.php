<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penugasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'Karyawan_id',
        'nama_penugasan',
        'alasan',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(karyawan::class, 'Karyawan_id');
    }
}
