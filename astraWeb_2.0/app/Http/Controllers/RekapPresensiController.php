<?php

namespace App\Http\Controllers;

use App\Exports\ExportRekap;
use App\Imports\Rekap;
use App\Models\rekap_presensi;
use Illuminate\Http\Request;
use App\Imports\RekapPresensiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel as ExcelExcel;

class RekapPresensiController extends Controller
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
        $this->authorize('HRD', $this->user);

        // Group by 'name' and count the 'status' where it equals 1 (present)
        $rekapPresensiSummary = rekap_presensi::select(
            'name',
            DB::raw('MIN(date) as first_presence'),
            DB::raw('MAX(date) as last_presence'),
            DB::raw('COUNT(*) as jumlah_kehadiran')
        )
            ->where('status', 1)
            ->groupBy('name')
            ->paginate(10);


        return view('presensi.index', [
            'rekap_presensi' => $rekapPresensiSummary
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $nama_file = rand() . $request->file->getClientOriginalName();

        $request->file->move('file_presensi', $nama_file);

        Excel::import(new Rekap, public_path('/file_presensi/' . $nama_file));

        return redirect()->route('presensi')->with('success', 'Data berhasil diimport');
    }
    /**
     * Display the specified resource.
     */
    public function show(rekap_presensi $rekap_presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rekap_presensi $rekap_presensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rekap_presensi $rekap_presensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rekap_presensi $rekap_presensi)
    {
        //
    }
}
