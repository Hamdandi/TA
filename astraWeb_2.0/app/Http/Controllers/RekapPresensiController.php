<?php

namespace App\Http\Controllers;

use App\Models\rekap_presensi;
use Illuminate\Http\Request;
use App\Imports\RekapPresensiImport;
use Maatwebsite\Excel\Facades\Excel;

class RekapPresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('presensi.index', [
            'rekap_presensi' => rekap_presensi::latest()->paginate(10)
        ]);
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
        // $file = $request->file('file');
        Excel::import(new RekapPresensiImport, $request->file);

        return back()->with('success', 'Data presensi berhasil diimport!');
    }

    /**
     * Display the specified resource.
     */
    public function show(rekap_presensi $rekap_presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rekap_presensi $rekap_presensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rekap_presensi $rekap_presensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rekap_presensi $rekap_presensi)
    {
        //
    }
}
