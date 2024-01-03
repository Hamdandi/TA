<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;

    public function jenisCutis()
    {
        return $this->hasMany(jenis_cuti::class, 'karyawan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
        return $this->hasMany(phk::class);
    }

    protected $fillable = [
        'user_id',
        'nama',
        'posisi',
        'nomor_hp',
        'alamat',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nip',
        'ttd',
        'photo',
    ];
    protected $dates = ['tanggal_lahir'];

    protected $table = 'karyawans';
}
