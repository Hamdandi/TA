<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\phk;
use Illuminate\Http\Request;

class PhkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('phk.index', [
            'phks' => phk::with('karyawan')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('phk.create', [
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
            'keterangan' => 'required',
        ]);

        phk::create($request->all());
        return redirect()->route('phk.index')
            ->with('success', 'phk created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(phk $phk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(phk $phk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, phk $phk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(phk $phk)
    {
        //
    }
}
