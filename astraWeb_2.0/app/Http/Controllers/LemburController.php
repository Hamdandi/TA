<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\karyawan;
use App\Models\lembur;
use Illuminate\Http\Request;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('lembur.index', [
            'lembur' => lembur::with('karyawan')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('lembur.create', [
            'karyawan' => karyawan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'mulai_lembur' => 'required|date_format:H:i',
            'selesai_lembur' => 'required|date_format:H:i|after:mulai_lembur',
            'status' => 'required|in:hari_biasa,hari_libur,hari_libur_besar',
        ]);

        $mulaiLembur = Carbon::createFromFormat('H:i', $request->mulai_lembur);
        $selesaiLembur = Carbon::createFromFormat('H:i', $request->selesai_lembur);

        // Perhitungan jumlah jam lembur
        $jumlahJam = $selesaiLembur->diffInHours($mulaiLembur);

        $lembur = new Lembur();
        $lembur->user_id = $request->user_id;
        $lembur->tanggal = $request->tanggal;
        $lembur->keterangan = $request->keterangan;
        $lembur->mulai_lembur = $mulaiLembur;
        $lembur->selesai_lembur = $selesaiLembur;
        $lembur->jumlah_jam = $jumlahJam;
        $lembur->status = $request->status;

        // Perhitungan total jam lembur untuk user
        $totalJam = Lembur::where('user_id', $request->user_id)->sum('jumlah_jam');
        $lembur->total_jam = $totalJam + $jumlahJam;

        $lembur->save();

        return redirect()->route('lembur.index')->with('success', 'Data lembur berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(lembur $lembur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lembur $lembur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lembur $lembur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lembur $lembur)
    {
        //
    }
}
