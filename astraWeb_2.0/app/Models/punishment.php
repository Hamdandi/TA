<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class punishment extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'keterangan',
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
