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
            'nip' => 'required',
            'ttd' => 'required|image|max:2048',
            'photo' => 'required|image|max:2048',
        ]);

        $validateData['ttd'] = $request->file('ttd')->store('ttd');
        $validateData['photo'] = $request->file('photo')->store('photo');


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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        // Validate the request data
        $validateData = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            // Make file upload fields optional
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

        // Handle the 'photo' file upload
        if ($request->hasFile('photo')) {
            // Delete the old file if it exists
            if ($karyawan->photo) {
                Storage::delete($karyawan->photo);
            }
            $validateData['photo'] = $request->file('photo')->store('photo');
        }

        // Update the karyawan record
        $karyawan->update($validateData);

        // Redirect to a specified route with a success message
        // Redirect to a different route, for example, a dashboard
        return redirect()->route('dashboard')
            ->with('success', 'Karyawan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(karyawan $karyawan)
    {
        //
    }
}
