<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuti extends Model
{
    use HasFactory;

    public function jenis_cuti()
    {
        return $this->belongsTo(jenis_cuti::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
