<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Karyawan;
use App\Models\lamaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LamaranController extends Controller
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
        return view('lamaran.index', [
            'lamarans' => lamaran::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('lamaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validateData = $request->validate([
            'lowongan_id' => 'required',
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|email',
            'alamat' => 'required',
            'nomor_hp' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'nama_sekolah' => 'required',
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'status_pernikahan' => 'required',
            'akun_media' => 'required',
            'resume' => 'required|file|mimes:pdf|max:2048', // Adding file validation
            'photo' => 'required|image|max:2048', // Adding image validation
        ]);

        // File Storage
        try {
            $validateData['resume'] = $request->file('resume')->store('resume-pdf');
            $validateData['photo'] = $request->file('photo')->store('photo');
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'File upload failed']);
        }

        // Database Insertion
        try {
            lamaran::create($validateData);
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Database operation failed']);
        }

        // Email Sending
        try {
            Mail::send('emails.lamaran-confirmation', [
                'subject' => 'Konfirmasi Lamaran Diterima',
                'content' => 'Terima kasih telah melamar. Lamaran Anda sedang diproses.'
            ], function ($message) use ($request) {
                $message->to($request->email)->subject('Konfirmasi Lamaran Diterima');
            });
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Failed to send email']);
        }


        // Redirect with Success Message
        return redirect('/')->with('success', 'Lamaran telah dikirim'); // Updated success message
    }


    /**
     * Display the specified resource.
     */
    public function show(lamaran $lamaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lamaran $lamaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lamaran $lamaran)
    {
        $validateData = $request->validate([
            'status' => 'required|in:menunggu,diterima,ditolak,interview,psikotes',
        ]);

        $lamaran->update($validateData);
        $subject = '';
        $emailContent = '';

        switch ($validateData['status']) {
            case 'diterima':
                $subject = 'Konfirmasi Diterima';
                $emailContent = 'Selamat, anda telah diterima sebagai karyawan kami. ';
                break;
            case 'ditolak':
                $subject = 'Maaf, Anda Tidak Diterima';
                $emailContent = 'Kami menyampaikan bahwa lamaran Anda tidak dapat kami terima.';
                break;
            case 'psikotes':
                $subject = 'Selamat, Anda Lulus Interview';
                $emailContent = 'Kabar baik, Anda telah lulus interview dan diundang untuk mengikuti psikotes.';
                break;
            default:
                $subject = 'Update Status Lamaran';
                $emailContent = 'Ada pembaruan terkait status lamaran Anda.';
                break;
        }

        Mail::send('emails.lamaran-confirmation', ['subject' => $subject, 'content' => $emailContent], function ($message) use ($lamaran, $subject) {
            $message->to($lamaran->email)
                ->subject($subject);
        });

        if ($validateData['status'] == 'diterima') {
            $this->moveToKaryawan($lamaran);
        }

        session()->flash('success', 'Status lamaran berhasil diubah.');

        return redirect('/lamaran');
    }

    private function moveToKaryawan(Lamaran $lamaran)
    {
        $existingUser = User::where('email', $lamaran->email)->first();
        if (!$existingUser) {
            // Membuat user baru
            $user = new User();
            $user->username = $lamaran->nama_lengkap; // Atau cara lain untuk menghasilkan username
            $user->email = $lamaran->email;
            $user->password = Hash::make('12345678');
            $user->role = 'karyawan';
            $user->save();

            // Mengirim email konfirmasi ke user dengan detail login
            Mail::send('emails.user-confirmation', ['user' => $user], function ($message) use ($user) {
                $message->to($user->email)->subject('Akun User Anda Telah Dibuat');
            });
        }

        $karyawan = new Karyawan();
        $karyawan->nama_lengkap = $lamaran->nama_lengkap;
        $karyawan->nomor_hp = $lamaran->nomor_hp;
        $karyawan->alamat = $lamaran->alamat;
        $karyawan->jenis_kelamin = $lamaran->jenis_kelamin;
        $karyawan->tempat_lahir = $lamaran->tempat_lahir;
        $karyawan->tanggal_lahir = $lamaran->tanggal_lahir;
        $karyawan->photo = $lamaran->photo;
        $karyawan->akun_media = $lamaran->akun_media;
        $karyawan->nama_sekolah = $lamaran->nama_sekolah;
        $karyawan->pendidikan = $lamaran->pendidikan;
        $karyawan->jurusan = $lamaran->jurusan;
        $karyawan->resume = $lamaran->resume;
        $karyawan->posisi = $lamaran->posisi; // Pastikan kolom posisi ada di tabel lamaran
        // Isi nilai-nilai lain yang diperlukan untuk karyawan
        // ...
        $karyawan->user_id = $existingUser ? $existingUser->id : $user->id;
        $karyawan->save();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lamaran $lamaran)
    {
        //
    }
}
