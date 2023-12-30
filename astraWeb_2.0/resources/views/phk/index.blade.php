@extends('template.master')
@section('title', 'phk')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Manajemen PHK</h3>
            <a href="{{ url('phk/create') }}" class="btn btn-primary">Add New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAME</th>
                        <th>POSISI</th>
                        <th>FILE</th>
                        <th>KETERANGAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($phks as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->karyawan->nama }}</td>
                            <td>{{ $item->karyawan->posisi }}</td>
                            <td><a href="{{ asset('storage/' . $item->file) }}" target="_blank">Lihst</a></td>
                            <td>{!! $item->keterangan !!}</td>
                            <td>
                                <a href="phk/edit/{{ $item->id }}" class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
