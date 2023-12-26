@extends('template.master')
@section('title', 'Lembur')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Manajemen Lembur</h3>
            <a href="{{ url('lembur/create') }}" class="btn btn-primary">Add New</a>
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
                    @foreach ($cutis as $item)
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
                                <a href="register/edit/{{ $item->id }}" class="btn btn-primary">Edit</a>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#read-karyawan-modal">
                                    Lihat
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



        <div class="modal fade" id="read-karyawan-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.card-body -->
    </div>
@endsection
