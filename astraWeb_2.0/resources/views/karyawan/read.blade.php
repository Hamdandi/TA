@extends('template.master')
@section('title', 'Detail Karyawan')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Karyawan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img class="img-thumbnail img-fluid mb-3" style="width: 150px; height: 150px;"
                        src="{{ asset('storage/' . $karyawan->photo) }}" alt="Foto Karyawan">
                    @if ($karyawan->ttd)
                        <p><strong>Tanda Tangan:</strong></p>
                        <img class="img-fluid" style="width: 100px; height: 100px;"
                            src="{{ asset('storage/' . $karyawan->ttd) }}">
                    @endif
                </div>
                <div class="col-md-8">
                    <p><strong>Nama Lengkap:</strong> {{ $karyawan->nama_lengkap }}</p>
                    <p><strong>NPK:</strong> {{ $karyawan->npk }}</p>
                    <p><strong>Posisi:</strong> {{ $karyawan->posisi }}</p>
                    <p><strong>Nomor HP:</strong> {{ $karyawan->nomor_hp }}</p>
                    <p><strong>Alamat:</strong> {{ $karyawan->alamat }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ $karyawan->jenis_kelamin }}</p>
                    <p><strong>Tempat Lahir:</strong> {{ $karyawan->tempat_lahir }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ $karyawan->tanggal_lahir }}</p>
                    <p><strong>Akun Media:</strong> {{ $karyawan->akun_media }}</p>
                    <p><strong>Nama Sekolah:</strong> {{ $karyawan->nama_sekolah }}</p>
                    <p><strong>Pendidikan:</strong> {{ $karyawan->pendidikan }}</p>
                    <p><strong>Jurusan:</strong> {{ $karyawan->jurusan }}</p>
                    @if ($karyawan->resume)
                        <p><strong>Resume:</strong> <a href="{{ asset('storage/' . $karyawan->resume) }}"
                                target="_blank">Download</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
