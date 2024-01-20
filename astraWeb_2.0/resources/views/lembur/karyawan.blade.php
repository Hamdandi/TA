@extends('template.master')
@section('title', 'Lembur')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title"><strong> Lembur</strong></h3>
            {{-- <a href="{{ url('lembur/create') }}" class="btn btn-primary" style="margin-left: auto;">Add New</a> --}}
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
                        {{-- <th>ACTION</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lembur as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->karyawan->nama_lengkap }}</td>
                            <td>{{ $item->mulai_lembur }}</td>
                            <td>{{ $item->selesai_lembur }}</td>
                            <td>{{ $item->jumlah_jam }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->total_jam }}</td>
                            <td>{{ $item->keterangan }}</td>
                            {{-- <td>
                                <a href="lembur/edit/{{ $item->id }}" class="btn btn-primary">Edit</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert-success").fadeOut('slow');
            }, 3000); // Waktu dalam milidetik, 3000 milidetik = 3 detik
        });
    </script>
@endsection
