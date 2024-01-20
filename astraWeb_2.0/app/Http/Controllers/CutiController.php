<?php

namespace App\Http\Controllers;

use App\Models\cuti;
use App\Models\jenis_cuti;
use App\Models\karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
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
        return view('cuti.index', [
            'cutis' => cuti::all(),
            'karyawans' => karyawan::all(),
            'jenis_cutis' => jenis_cuti::all(),
        ]);
    }

    public function getDataByuser()
    {
        //
        return view('cuti.karyawan', [
            'cutis' => cuti::with('karyawan')->where('user_id', Auth::user()->id)->get(),
            'karyawans' => karyawan::all(),
            'jenis_cutis' => jenis_cuti::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cuti.create', [
            'karyawans' => karyawan::all(),
            'jenis_cutis' => jenis_cuti::all(),
            'cutis' => cuti::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'jenis_cuti_id' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required',
        ]);

        // Hitung jumlah hari cuti
        $tanggalMulai = new \DateTime($request->tanggal_mulai);
        $tanggalSelesai = new \DateTime($request->tanggal_selesai);
        $jumlahHari = $tanggalMulai->diff($tanggalSelesai)->days + 1;

        // Cari cuti terakhir dari user ini untuk jenis cuti ini, jika ada
        $cutiTerakhir = Cuti::where('user_id', Auth::user()->id)
            ->where('jenis_cuti_id', $request->jenis_cuti_id)
            ->orderBy('created_at', 'desc')
            ->first();

        $sisaCuti = $cutiTerakhir ? $cutiTerakhir->sisa_cuti : jenis_cuti::find($request->jenis_cuti_id)->jatah_cuti;

        if ($sisaCuti < $jumlahHari) {
            return back()->with('error', 'Jatah cuti tidak mencukupi.');
        }

        // Buat pengajuan cuti
        $cuti = new Cuti();
        $cuti->user_id = Auth::user()->id;
        $cuti->jenis_cuti_id = $request->jenis_cuti_id;
        $cuti->tanggal_mulai = $request->tanggal_mulai;
        $cuti->tanggal_selesai = $request->tanggal_selesai;
        $cuti->alasan = $request->alasan;
        $cuti->jumlah_hari = $jumlahHari;
        $cuti->sisa_cuti = $sisaCuti - $jumlahHari; // Menghitung sisa cuti
        $cuti->status = 'menunggu'; // Status awal
        $cuti->save();

        return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cuti $cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->authorize('HRD', $this->user);
        $cuti = Cuti::findOrFail($id);

        // Validasi input
        $request->validate([
            'status' => 'required|in:diterima,ditolak,menunggu', // Validasi status
            'keterangan' => 'required', // Validasi keterangan
        ]);

        // Jika status diubah menjadi 'ditolak', kembalikan sisa cuti
        if ($request->status == 'ditolak' && $cuti->status != 'ditolak') {
            $cuti->sisa_cuti += $cuti->jumlah_hari;
        }

        // Update status cuti
        $cuti->status = $request->status;
        $cuti->keterangan = $request->keterangan;
        $cuti->save();

        return redirect()->route('cuti.index')->with('success', 'Status cuti berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cuti $cuti)
    {
        //
        $cuti->delete();
        return redirect('/cuti')->with('success', 'Cuti berhasil dihapus');
    }

    public function verifikasiCuti($id)
    {
        $cuti = Cuti::findOrFail($id);

        // Verifikasi cuti dan kurangi sisa cuti
        $jenisCuti = jenis_cuti::where('karyawan_id', $cuti->karyawan_id)
            ->where('jenis_cuti', $cuti->jenis_cuti_id)
            ->first();

        if ($jenisCuti && $jenisCuti->sisa_cuti >= $cuti->jumlah_hari) {
            $jenisCuti->sisa_cuti -= $cuti->jumlah_hari;
            $jenisCuti->save();

            $cuti->status = 'diterima';
            $cuti->save();

            // Kirim notifikasi ke karyawan
            // Anda bisa mengimplementasikan sistem notifikasi Anda di sini

            return redirect()->back()->with('success', 'Cuti telah diterima.');
        } else {
            return redirect()->back()->with('error', 'Cuti tidak dapat diverifikasi.');
        }
    }
}
