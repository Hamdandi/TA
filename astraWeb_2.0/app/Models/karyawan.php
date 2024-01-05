<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;

    public function lamaran()
    {
        return $this->belongsTo(lamaran::class, 'lamaran_id');
    }

    public function jenisCutis()
    {
        return $this->hasMany(jenis_cuti::class, 'karyawan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function reward()
    {
        return $this->hasMany(reward::class);
    }

    public function punishment()
    {
        return $this->hasMany(punishment::class);
    }

    public function phk()
    {
        return $this->hasMany(phk::class, 'karyawan_id');
    }

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'posisi',
        'nomor_hp',
        'alamat',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'npk',
        'ttd',
        'photo',
        'akun_media',
        'nama_sekolah',
        'pendidikan',
        'jurusan',
        'resume',
    ];
    protected $dates = ['tanggal_lahir'];

    protected $table = 'karyawans';
}
