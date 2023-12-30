<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\punishment;
use Illuminate\Http\Request;

class PunishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('punishment.index', [
            'punishments' => punishment::with('karyawan')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('punishment.create', [
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

        punishment::create($request->all());
        return redirect()->route('punishment.index')
            ->with('success', 'punishment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(punishment $punishment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(punishment $punishment)
    {
        //
        return view('punishment.update', [
            'punishment' => $punishment,
            'karyawans' => karyawan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, punishment $punishment)
    {
        //
        $validateData = $request->validate([
            'karyawan_id' => 'required',
            'keterangan' => 'required',
        ]);

        punishment::where('id', $punishment->id)
            ->update($validateData);

        return redirect()->route('punishment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(punishment $punishment)
    {
        //
    }
}
