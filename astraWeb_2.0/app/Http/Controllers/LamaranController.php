<?php

namespace App\Http\Controllers;

use App\Models\lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'foto' => 'required|image|max:2048', // Adding image validation
        ]);

        // File Storage
        try {
            $validateData['resume'] = $request->file('resume')->store('resume-pdf');
            $validateData['foto'] = $request->file('foto')->store('foto');
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
                $emailContent = 'Selamat, lamaran Anda telah diterima.';
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



        session()->flash('success', 'Status lamaran berhasil diubah.');

        return redirect('/lamaran');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lamaran $lamaran)
    {
        //
    }
}
