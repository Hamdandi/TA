<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\karyawan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user(); // atau Auth::user();

        return view('profile.edit', [
            'user' => $user,
        ]);
    }



    public function profile($karyawanId): View
    {
        $karyawan = Karyawan::find($karyawanId);

        if (!$karyawan) {
            abort(404, 'Employee not found');
        }

        return view('profile.index', [
            'karyawan' => $karyawan,
        ]);
    }


    public function changePassword(Request $request): View
    {
        return view('profile.password', [
            'user' => $request->user(),
        ]);
    }

    public function editKaryawan(): View
    {
        $karyawan = Auth::user()->karyawan; // Mengambil data karyawan dari user yang login

        if (!$karyawan) {
            abort(404, 'Karyawan tidak ditemukan');
        }

        return view('profile.edit-karyawan', [
            'karyawan' => $karyawan,
        ]);
    }
    public function updateKaryawan(Request $request, Karyawan $karyawan): RedirectResponse
    {
        // Validasi request (sesuaikan aturan validasi sesuai kebutuhan Anda)
        $validatedData = $request->validate([
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
            // Tambahkan aturan validasi untuk field lainnya
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

        // Mencari karyawan dan mengupdate data
        $karyawan->update($validatedData);
        dd($validatedData);
        karyawan::where('id', $$karyawan->id)->update($validatedData);

        return redirect()->route('profile.edit-karyawan')->with('status', 'Data karyawan diperbarui');
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
