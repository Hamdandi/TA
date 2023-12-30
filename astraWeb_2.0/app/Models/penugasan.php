<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penugasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'nama_penugasan',
        'alasan',
        'tanggal_mulai',
        'tanggal_selesai',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(karyawan::class, 'karyawan_id');
    }
}
