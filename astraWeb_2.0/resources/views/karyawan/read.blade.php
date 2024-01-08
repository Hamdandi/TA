@extends('template.master')
@section('title', 'Detail Karyawan')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Karyawan</h3>
        </div>
        <div class="card-body">
            <p>Nama Lengkap: {{ $karyawan->nama_lengkap }}</p>
            <p>NPK: {{ $karyawan->npk }}</p>
            <p>Posisi: {{ $karyawan->posisi }}</p>
            {{-- Tambahkan detail lainnya sesuai kebutuhan --}}
            <img class="img-thumbnail img-fluid" width="100px" height="100px" src="{{ asset('storage/' . $karyawan->photo) }}"
                alt="Foto Karyawan">
            {{-- Tambahkan lebih banyak informasi jika perlu --}}
        </div>
    </div>
@endsection
