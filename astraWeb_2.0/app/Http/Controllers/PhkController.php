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
            'karyawans' => karyawan::all(),
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
        $validateData = $request->validate([
            'karyawan_id' => 'required|integer|exists:karyawans,id',
            'keterangan' => 'required',
            'file' => 'required|mimes:pdf|max:3048',
        ]);

        $karyawan = Karyawan::find($validateData['karyawan_id']);

        if (!$karyawan) {
            return back()->withErrors(['karyawan_id' => 'Karyawan tidak ditemukan.']);
        }

        $phkData = [
            'user_id' => $karyawan->user_id,
            'nama_lengkap' => $karyawan->nama_lengkap,
            'npk' => $karyawan->npk,
            'posisi' => $karyawan->posisi,
            'nomor_hp' => $karyawan->nomor_hp,
            'alamat' => $karyawan->alamat,
            'jenis_kelamin' => $karyawan->jenis_kelamin,
            'tempat_lahir' => $karyawan->tempat_lahir,
            'tanggal_lahir' => $karyawan->tanggal_lahir,
            'akun_media' => $karyawan->akun_media,
            'nama_sekolah' => $karyawan->nama_sekolah,
            'pendidikan' => $karyawan->pendidikan,
            'jurusan' => $karyawan->jurusan,
            'resume' => $karyawan->resume,
            'ttd' => $karyawan->ttd,
            'photo' => $karyawan->photo,
            'keterangan' => $validateData['keterangan'],
            'file_phk' => $request->file('file')->store('phk-pdf')
        ];

        Phk::create($phkData);
        $karyawan->delete();

        // Nonaktifkan user yang terkait dengan karyawan
        $this->handleUserDeactivation($karyawan->user_id);

        session()->flash('success', 'PHK berhasil ditambahkan');
        return redirect()->route('phk.index');
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
    public function update(Request $request, Phk $phk)
    {
        $validateData = $request->validate([
            'karyawan_id' => 'required|integer|exists:karyawans,id',
            'keterangan' => 'required',
            'file' => 'required|mimes:pdf|max:3048',
        ]);

        $karyawan = Karyawan::find($validateData['karyawan_id']);

        if (!$karyawan) {
            return back()->withErrors(['karyawan_id' => 'Karyawan tidak ditemukan.']);
        }

        if ($request->old_file) {
            Storage::delete($request->old_file);
        }

        $validateData['file'] = $request->file('file')->store('phk-pdf');
        $phk->update($validateData);

        $this->handleUserDeactivation($karyawan->user_id);

        session()->flash('success', 'PHK berhasil diupdate');
        return redirect()->route('phk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(phk $phk)
    {
        //
    }

    private function handleUserDeactivation($userId)
    {
        $karyawan = Karyawan::find($userId);

        if ($karyawan && $karyawan->user) {
            $karyawan->user->is_active = false;
            $karyawan->user->save();
        } else {
        }
    }
}
