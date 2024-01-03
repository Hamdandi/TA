<?php

namespace App\Http\Controllers;

use App\Models\cuti;
use App\Models\jenis_cuti;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $cuti = cuti::where('user_id', Auth::user()->id)->with('jenis_cuti')->latest()->get();  // Retrieve the latest cuti(s)


        return view('dashboard', [
            'user' => Auth::user(),
            'cuti' => $cuti,
            'jenis_cuti' => jenis_cuti::all(),
        ]);
    }
}
