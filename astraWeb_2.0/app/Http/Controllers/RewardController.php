<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('reward.index', [
            'rewards' => reward::with('karyawan')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('reward.create', [
            'karyawans' => karyawan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'karyawan_id' => 'required',
            'keterangan' => 'required',
        ]);

        reward::create($request->all());
        // dd($request->all());
        return redirect()->route('reward.index')
            ->with('success', 'reward created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(reward $reward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reward $reward)
    {
        //
        return view('reward.update', [
            'reward' => $reward,
            'karyawans' => karyawan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reward $reward)
    {
        //
        $validationData = $request->validate([
            'karyawan_id' => 'required',
            'keterangan' => 'required',
        ]);

        reward::where('id', $reward->id)
            ->update($validationData);

        return redirect()->route('reward.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reward $reward)
    {
        //
    }
}
