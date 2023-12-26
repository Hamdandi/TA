<?php

namespace App\Http\Controllers;

use App\Models\cuti;
use App\Models\jenis_cuti;
use App\Models\karyawan;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $karyawans = karyawan::with('jenisCutis')->get(); // Mengambil semua karyawan dan jenis cuti terkait
        return view('cuti.index', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cuti $cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cuti $cuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cuti $cuti)
    {
        //
    }

    public function verifikasiCuti($id)
    {
        $cuti = Cuti::findOrFail($id);

        // Verifikasi cuti dan kurangi sisa cuti
        $jenisCuti = jenis_cuti::where('karyawan_id', $cuti->karyawan_id)
            ->where('jenis_cuti', $cuti->jenis_cuti_id)
            ->first();

        if ($jenisCuti && $jenisCuti->sisa_cuti >= $cuti->jumlah_hari) {
            $jenisCuti->sisa_cuti -= $cuti->jumlah_hari;
            $jenisCuti->save();

            $cuti->status = 'diterima';
            $cuti->save();

            // Kirim notifikasi ke karyawan
            // Anda bisa mengimplementasikan sistem notifikasi Anda di sini

            return redirect()->back()->with('success', 'Cuti telah diterima.');
        } else {
            return redirect()->back()->with('error', 'Cuti tidak dapat diverifikasi.');
        }
    }
}
