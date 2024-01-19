<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\karyawan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
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

        return view('profile.index', [
            'user' => $user,
        ]);
    }

    public function profile()
    {
        $user = auth()->user();
        $karyawan = $user->karyawan;

        return view('profile.index', compact('user', 'karyawan'));
    }



    public function changePasswordView(): View
    {
        return view('profile.password');
    }

    public function changePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) use ($request) {
                if (!Hash::check($value, $request->user()->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'new_password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = $request->user();
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        // Assuming the user model has a karyawan_id attribute
        $karyawanId = $user->id;

        return redirect()->route('profile.index', ['profile' => $karyawanId])->with('status', 'Password changed successfully');
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
        ]);


        if ($request->hasFile('ttd')) {
            if ($karyawan->ttd) {
                Storage::delete($karyawan->ttd);
            }
            $validatedData['ttd'] = $request->file('ttd')->store('ttd');
        }

        if ($request->hasFile('resume')) {
            if ($karyawan->resume) {
                Storage::delete($karyawan->resume);
            }
            $validatedData['resume'] = $request->file('resume')->store('resume');
        }

        if ($request->hasFile('photo')) {
            if ($karyawan->photo) {
                Storage::delete($karyawan->photo);
            }
            $validatedData['photo'] = $request->file('photo')->store('photo');
        }

        // dd($validatedData);
        $karyawan->update($validatedData);

        $user = $request->user();
        return redirect()->route('profile.index', ['profile' => $user->id])->with('status', 'Data karyawan diperbarui');
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
