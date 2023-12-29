<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Req;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = Auth::id(); // Mendapatkan ID dari user yang sedang login
        $mode = $request->input('mode', 'received'); // Default adalah 'received'

        if ($mode == 'sent') {
            $req = Req::where('user_id', $userId)->get();
        } else { // 'received' dan kondisi default
            $req = Req::where('send_to', $userId)->get();
        }

        return view('req.index', compact('req', 'mode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('req.create', [
            'req' => new Req(),
            'karyawan' => Karyawan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'send_to' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $validated['user_id'] = auth()->user()->id;
        // dd($validated);
        Req::create($validated);
        return redirect('/req')->with('success', 'Permintaan berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(Req $req)
    {
        //
        return view('req.read', [
            'req' => $req,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Req $req)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Req $req)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Req $req)
    {
        //
    }
}
