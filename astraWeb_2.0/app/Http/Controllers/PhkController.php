<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
        $validateData = $request->validate([
            'karyawan_id' => 'required|integer|exists:karyawans,id',
            'keterangan' => 'required',
            'file' => 'required|mimes:pdf|max:3048',
        ]);

        $validateData['file'] = $request->file('file')->store('phk-pdf');
        phk::create($validateData);
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
        return view('phk.update', [
            'phk' => $phk,
            'karyawans' => karyawan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, phk $phk)
    {
        //
        $validateData = $request->validate([
            'karyawan_id' => 'required|integer|exists:karyawans,id',
            'keterangan' => 'required',
            'file' => 'required|mimes:pdf|max:3048',
        ]);

        if ($request->old_file) {
            Storage::delete($request->old_file);
        }
        $validateData['file'] = $request->file('file')->store('phk-pdf');
        phk::where('id', $phk->id)
            ->update($validateData);

        dd($validateData);
        return redirect()->route('phk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(phk $phk)
    {
        //
    }
}
