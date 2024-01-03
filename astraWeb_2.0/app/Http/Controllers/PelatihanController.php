<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\pelatihan;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pelatihan.index', [
            'pelatihan' => pelatihan::with('karyawan')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pelatihan.create', [
            'karyawans' => karyawan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'karyawan_id' => 'required',
            'nama_pelatihan' => 'required',
        ]);

        pelatihan::create($validatedData);
        session()->flash('success', 'Pelatihan berhasil ditambahkan');
        return redirect()->route('pelatihan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(pelatihan $pelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelatihan $pelatihan)
    {
        //
        return view('pelatihan.update', [
            'pelatihan' => $pelatihan,
            'karyawans' => karyawan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pelatihan $pelatihan)
    {
        //
        $validatedData = $request->validate([
            'karyawan_id' => 'required',
            'nama_pelatihan' => 'required',
        ]);

        pelatihan::where('id', $pelatihan->id)
            ->update($validatedData);

        session()->flash('success', 'Pelatihan berhasil diupdate');
        return redirect()->route('pelatihan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelatihan $pelatihan)
    {
        //
    }
}
