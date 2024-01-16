<?php

namespace App\Http\Controllers;

use App\Models\lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LowonganController extends Controller
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
        $this->authorize('HRD', $this->user);
        return view('lowongan.index', [
            'lowongans' => lowongan::all()
        ]);
    }

    public function landing()
    {
        //
        return view('lowongan.landing', [
            'lowongans' => lowongan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('lowongan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validationData = $request->validate([
            'nama_lowongan' => 'required',
            'jenis_pekerjaan' => 'required',
            'deskripsi_pekerjaan' => 'required',
            'persyaratan' => 'required',
        ]);

        $validationData['short'] = Str::limit(strip_tags($request->deskripsi_pekerjaan), 100);

        lowongan::create($validationData);
        // dd($request->all());
        session()->flash('success', 'Lowongan berhasil ditambahkan');

        return redirect('/lowongan');
    }

    /**
     * Display the specified resource.
     */
    public function show(lowongan $lowongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lowongan $lowongan)
    {
        //
        return view('lowongan.update', [
            'lowongan' => $lowongan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lowongan $lowongan)
    {
        //
        $validationData = $request->validate([
            'nama_lowongan' => 'required',
            'jenis_pekerjaan' => 'required',
            'deskripsi_pekerjaan' => 'required',
            'persyaratan' => 'required',
        ]);

        $validationData['short'] = Str::limit(strip_tags($request->deskripsi_pekerjaan), 100);

        lowongan::where('id', $lowongan->id)
            ->update($validationData);

        session()->flash('success', 'Lowongan berhasil diupdate');
        return redirect('/lowongan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lowongan $lowongan)
    {
        //
        $lowongan->delete();
        return redirect('/lowongan')->with('success', 'Lowongan berhasil dihapus');
    }
}
