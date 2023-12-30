@extends('template.master')
@section('title', 'Penugasan')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Manajemen Penugasan</h3>
            <a href="{{ url('penugasan/create') }}" class="btn btn-primary">Add New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
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
                            <td>{{ $item->karyawan->nama }}</td>
                            <td>{{ $item->karyawan->posisi }}</td>
                            <td>{{ $item->nama_penugasan }}</td>
                            <td>{{ $item->tanggal_mulai }}</td>
                            <td>{{ $item->tanggal_selesai }}</td>
                            <td>{{ $item->file }}</td>
                            <td>{{ $item->alasan }}</td>
                            <td>
                                <a href="register/edit/{{ $item->id }}" class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
