@extends('template.master')
@section('title', 'Presensi')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title"><strong>Rekap Presensi</strong></h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importPresensiModal"
                style="margin-left: auto;">
                Import Presensi
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA KARYAWAN</th>
                        <th>Tanggal</th>
                        <th>JUMLAH KEHADIRAN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekap_presensi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->last_presence }}</td>
                            <td>{{ $item->jumlah_kehadiran }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- Modal untuk Import Presensi -->
    <div class="modal fade" id="importPresensiModal" tabindex="-1" role="dialog"
        aria-labelledby="importPresensiModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('rekap-presensi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importPresensiModalLabel">Import Data Presensi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">Pilih File CSV/Excel</label>
                            <input type="file" class="form-control-file" id="file" name="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Import</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
