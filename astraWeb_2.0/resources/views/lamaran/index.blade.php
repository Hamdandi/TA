@extends('template.master')
@section('title', 'Lamaran')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">List Lamaran Pekekerja</h3>
            <a href="{{ url('lamaran/create') }}" class="btn btn-primary">Add New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID LOWONGAN</th>
                        <th>NAMA PELAMAR</th>
                        <th>EMAIL</th>
                        <th>NOMOR HP</th>
                        <th>ALAMAT</th>
                        <th>JENIS KELAMIN</th>
                        <th>NAMA SEKOLAH/KAMPUS</th>
                        <th>PENDIDIKAN</th>
                        <th>JURUSAN</th>
                        <th>TEMPAT LAHIR</th>
                        <th>TANGGAL LAHIR</th>
                        <th>STATUS PERNIKAHAN</th>
                        <th>AKUN MEDIA</th>
                        <th>RESUME</th>
                        <th>FOTO</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lamarans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->lowongan->nama_lowongan }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->nomor_hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->nama_sekolah }}</td>
                            <td>{{ $item->pendidikan }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->status_pernikahan }}</td>
                            <td>{{ $item->akun_media }}</td>
                            <td>{{ $item->resume }}</td>
                            <td>{{ $item->foto }}</td>
                            <td>{{ $item->statu }}</td>
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
