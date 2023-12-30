@extends('template.master')
@section('title', 'Pelatihan')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Manajemen Pelatihan</h3>
            <a href="{{ url('pelatihan/create') }}" class="btn btn-primary">Add New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAME</th>
                        <th>POSISI</th>
                        <th>NAMA PELATIHAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelatihan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->karyawan->nama }}</td>
                            <td>{{ $item->karyawan->posisi }}</td>
                            <td>{{ $item->nama_pelatihan }}</td>
                            <td>
                                <a href="pelatihan/edit/{{ $item->id }}" class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
