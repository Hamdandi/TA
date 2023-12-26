<?php

namespace App\Http\Controllers;

use App\Models\jenis_cuti;
use Illuminate\Http\Request;

class JenisCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('jenis-cuti.index', [
            'jenis_cutis' => jenis_cuti::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('jenis_cuti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis_cuti $jenis_cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jenis_cuti $jenis_cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jenis_cuti $jenis_cuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jenis_cuti $jenis_cuti)
    {
        //
    }
}
