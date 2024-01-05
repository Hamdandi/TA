<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phk extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nomor_hp',
        'alamat',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'photo',
        'akun_media',
        'nama_sekolah',
        'pendidikan',
        'jurusan',
        'resume',
        'npk',
        'ttd',
        'keterangan',
        'file_phk',
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
