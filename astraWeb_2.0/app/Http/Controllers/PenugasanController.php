<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\penugasan;
use Illuminate\Http\Request;

class PenugasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('penugasan.index', [
            'penugasan' => penugasan::with('karyawan')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('penugasan.create', [
            'karyawans' => karyawan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'karyawan_id' => 'required',
            'nama_penugasan' => 'required',
            'alasan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        penugasan::create($request->all());
        return redirect()->route('penugasan.index')->with('success', 'Penugasan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(penugasan $penugasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penugasan $penugasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penugasan $penugasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penugasan $penugasan)
    {
        //
    }
}
