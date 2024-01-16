<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\karyawan;
use App\Models\penugasan;
use Illuminate\Http\Request;

class PenugasanController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
    }
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
        $this->authorize('HRD', $this->user);
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
        $validateData = $request->validate([
            'karyawan_id' => 'required|integer|exists:karyawans,id',
            'nama_penugasan' => 'required',
            'alasan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $validateData['file'] = $request->file('file')->store('penugasan-pdf');
        penugasan::create($validateData);
        session()->flash('success', 'Penugasan berhasil ditambahkan');
        return redirect()->route('penugasan.index');
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
        $this->authorize('HRD', $this->user);
        return view('penugasan.update', [
            'penugasan' => $penugasan,
            'karyawans' => karyawan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penugasan $penugasan)
    {
        //
        $validateData = $request->validate([
            'karyawan_id' => 'required|integer|exists:karyawans,id',
            'nama_penugasan' => 'required',
            'alasan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        if ($request->old_file) {
            Storage::delete($request->old_file);
        }
        $validateData['file'] = $request->file('file')->store('penugasan-pdf');
        penugasan::where('id', $penugasan->id)->update($validateData);
        session()->flash('success', 'Penugasan berhasil diupdate');
        return redirect()->route('penugasan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penugasan $penugasan)
    {
        //
    }
}
