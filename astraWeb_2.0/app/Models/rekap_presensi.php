<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekap_presensi extends Model
{
    use HasFactory;

    protected $table = 'rekap_presensis';

    protected $fillable = ['name', 'date', 'status'];
}
