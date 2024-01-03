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
                        <th>TANGGAL</th>
                        <th>NAME</th>
                        <th>MULAI</th>
                        <th>SELESAI</th>
                        <th>JUMLAH</th>
                        <th>HB/HL</th>
                        <th>TOTAL</th>
                        <th>KETERANGAN</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lembur as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->karyawan->nama }}</td>
                            <td>{{ $item->mulai_lembur }}</td>
                            <td>{{ $item->selesai_lembur }}</td>
                            <td>{{ $item->jumlah_jam }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->total_jam }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                <a href="lembur/edit/{{ $item->id }}" class="btn btn-primary">Edit</a>
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

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert-success").fadeOut('slow');
            }, 3000); // Waktu dalam milidetik, 3000 milidetik = 3 detik
        });
    </script>
@endsection
