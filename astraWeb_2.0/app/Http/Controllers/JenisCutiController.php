<?php

namespace App\Http\Controllers;

use App\Models\jenis_cuti;
use Illuminate\Http\Request;

class JenisCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('jenis-cuti.index', [
            'jenis_cutis' => jenis_cuti::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('jenis-cuti.create', [
            'jenis_cutis' => jenis_cuti::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'jenis_cuti' => 'required',
            'jatah_cuti' => 'required'
        ]);

        jenis_cuti::create($request->all());
        session()->flash('success', 'Jenis Cuti berhasil ditambahkan');
        return redirect('/jenis-cuti');
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis_cuti $jenis_cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jenis_cuti $jenis_cuti)
    {
        //
        return view('jenis-cuti.update', [
            'jenis_cuti' => $jenis_cuti,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jenis_cuti $jenis_cuti)
    {
        //
        $validateData = $request->validate([
            'jenis_cuti' => 'required',
            'jatah_cuti' => 'required'
        ]);

        jenis_cuti::where('id', $jenis_cuti->id)
            ->update($validateData);
        session()->flash('success', 'Jenis Cuti berhasil diupdate');
        return redirect('/jenis-cuti');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jenis_cuti $jenis_cuti)
    {
        //
        $jenis_cuti->delete();
        return redirect()->route('jenis-cuti.index')
            ->with('success', 'Jenis Cuti deleted successfully');
    }
}
