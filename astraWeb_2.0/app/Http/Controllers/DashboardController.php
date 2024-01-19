<?php

namespace App\Http\Controllers;

use App\Models\cuti;
use App\Models\jenis_cuti;
use App\Models\karyawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\lamaran;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $cuti = cuti::where('user_id', Auth::user()->id)->with('jenis_cuti')->latest()->get();
        $jumlahCuti = cuti::count();

        $lamaran = lamaran::count();
        $karyawan = karyawan::count();

        return view('dashboard', [
            'user' => Auth::user(),
            'cuti' => $cuti,
            'jumlahCuti' => $jumlahCuti,
            'jenis_cuti' => jenis_cuti::all(),
            'lamaran' => $lamaran,
            'karyawan' => $karyawan
        ]);
    }
}
