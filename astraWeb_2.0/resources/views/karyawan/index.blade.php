@extends('template.master')
@section('title', 'Keryawan')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Manajemen Karyawan</h3>
            <a href="{{ url('karyawan/create') }}" class="btn btn-primary">Add New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>USERNAME</th>
                        <th>NAME</th>
                        <th>NIK</th>
                        <th>POSISI</th>
                        <th>NOMOR HP</th>
                        <th>ALAMAT</th>
                        <th>JENIS KELAMIN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawans as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->user->username }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->posisi }}</td>
                            <td>{{ $item->nomor_hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#karyawanModal-{{ $item->id }}">
                                    Lihat Detail
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal for each karyawan -->
    </div>


@endsection
