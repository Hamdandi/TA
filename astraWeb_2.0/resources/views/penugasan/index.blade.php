@extends('template.master')
@section('title', 'Penugasan')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title"><strong>Manajemen Penugasan</strong></h3>
            <a href="{{ url('penugasan/create') }}" class="btn btn-primary" style="margin-left: auto;">Add New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAME</th>
                        <th>POSISI</th>
                        <th>PERIHAL</th>
                        <th>TANGGAL MULAI</th>
                        <th>TANGGAL SELESAI</th>
                        <th>FILE</th>
                        <th>KETERANGAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penugasan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->karyawan->nama_lengkap }}</td>
                            <td>{{ $item->karyawan->posisi }}</td>
                            <td>{{ $item->nama_penugasan }}</td>
                            <td>{{ $item->tanggal_mulai }}</td>
                            <td>{{ $item->tanggal_selesai }}</td>
                            <td><a class="btn btn-outline-info btn-sm" href="{{ asset('storage/' . $item->file) }}"
                                    target="_blank">Lihat</a></td>
                            <td>{{ $item->alasan }}</td>
                            <td>
                                <a href="penugasan/edit/{{ $item->id }}" class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert-success").fadeOut('slow');
            }, 3000); // Waktu dalam milidetik, 3000 milidetik = 3 detik
        });
    </script>
@endsection
