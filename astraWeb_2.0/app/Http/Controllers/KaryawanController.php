<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\user;
use App\Models\karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawan.index', compact('karyawans'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('karyawan.create', [
            'users' => user::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'user_id' => 'required',
            'nama' => 'required',
            'posisi' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'npk' => 'required',
            'akun_media' => 'required',
            'nama_sekolah' => 'required',
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'resume' => 'required|image|max:2048',
            'ttd' => 'required|image|max:2048',
            'photo' => 'required|image|max:2048',
        ]);

        $validateData['ttd'] = $request->file('ttd')->store('ttd');
        $validateData['photo'] = $request->file('photo')->store('photo');
        $validateData['resume'] = $request->file('resume')->store('resume');


        karyawan::create($validateData);
        return redirect()->route('karyawan.index')
            ->with('success', 'karyawan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(karyawan $karyawan)
    {
        //
        return view('karyawan.update', [
            'karyawan' => $karyawan,
            'users' => user::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        // Validate the request data
        $validateData = $request->validate([
            'user_id' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'npk' => 'required',
            'posisi' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'akun_media' => 'required',
            'nama_sekolah' => 'required',
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'resume' => 'sometimes|image|max:2048',
            'ttd' => 'sometimes|image|max:2048',
            'photo' => 'sometimes|image|max:2048',
        ]);

        // Handle the 'ttd' file upload
        if ($request->hasFile('ttd')) {
            // Delete the old file if it exists
            if ($karyawan->ttd) {
                Storage::delete($karyawan->ttd);
            }
            $validateData['ttd'] = $request->file('ttd')->store('ttd');
        }

        if ($request->hasFile('resume')) {
            // Delete the old file if it exists
            if ($karyawan->resume) {
                Storage::delete($karyawan->resume);
            }
            $validateData['resume'] = $request->file('resume')->store('resume');
        }

        if ($request->hasFile('photo')) {
            if ($karyawan->photo) {
                Storage::delete($karyawan->photo);
            }
            $validateData['photo'] = $request->file('photo')->store('photo');
        }

        $karyawan->update($validateData);

        session()->flash('success', "karyawan updated successfully");
        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(karyawan $karyawan)
    {
        //
    }
}
