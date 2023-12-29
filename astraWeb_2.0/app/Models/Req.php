<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'send_to',
        'subject',
        'message',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sendTo()
    {
        return $this->belongsTo(User::class, 'send_to');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'user_id');
    }

    public function karyawanSendTo()
    {
        // Asumsi bahwa relasi antara tabel users dan karyawan diatur di model User
        return $this->sendTo->karyawan();
    }
}
