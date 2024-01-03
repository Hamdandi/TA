<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lamaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'lowongan_id',
        'nama_lengkap',
        'email',
        'alamat',
        'nomor_hp',
        'jenis_kelamin',
        'nama_sekolah',
        'pendidikan',
        'jurusan',
        'tempat_lahir',
        'tanggal_lahir',
        'status_pernikahan',
        'akun_media',
        'resume',
        'foto',
        'status',
    ];

    public function lowongan()
    {
        return $this->belongsTo(lowongan::class, 'lowongan_id');
    }
}
