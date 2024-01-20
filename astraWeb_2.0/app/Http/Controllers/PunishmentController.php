<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\punishment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PunishmentController extends Controller
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
        return view('punishment.index', [
            'punishments' => punishment::with('karyawan')->get()
        ]);
    }

    public function getDataByUser()
    {
        //
        return view('punishment.karyawan', [
            'punishments' => punishment::with('karyawan')->where('karyawan_id', Auth::user()->id)->get(),
            'karyawans' => karyawan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('HRD', $this->user);
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
        session()->flash('success', 'Punishment berhasil ditambahkan');
        return redirect()->route('punishment.index');
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
        $this->authorize('HRD', $this->user);
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

        session()->flash('success', 'Punishment berhasil diupdate');
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
