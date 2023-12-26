@extends('template.master')
@section('title', 'Cuti')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Manajemen Cuti</h3>
            <a href="{{ url('cuti/create') }}" class="btn btn-primary">Add New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Karyawan</th>
                        <th>Jenis Cuti</th>
                        <th>Jumlah Hari</th>
                        <th>Sisa Cuti</th>
                        <th>Aksi</th> <!-- Kolom untuk tombol verifikasi -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawans as $karyawan)
                        @foreach ($karyawan->jenisCutis as $jenisCuti)
                            <tr>
                                <td>{{ $karyawan->nama }}</td>
                                <td>{{ $jenisCuti->jenis_cuti }}</td>
                                <td>{{ $jenisCuti->jumlah_hari }}</td>
                                <td>{{ $jenisCuti->sisa_cuti }}</td>
                            </tr>
                        @endforeach
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
