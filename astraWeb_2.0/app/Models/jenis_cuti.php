<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class jenis_cuti extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['jenis_cuti', 'jatah_cuti'];
    protected $dates = ['deleted_at'];

    // Relasi dengan Karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id');
    }

    // Relasi dengan Cuti
    public function cutis()
    {
        return $this->hasMany(Cuti::class);
    }
}
