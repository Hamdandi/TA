@extends('template.master')
@section('title', 'Keryawan')
@section('content')
    <div class="card p-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title"><strong>Manajemen Karyawan</strong></h3>
            <a href="{{ url('karyawan/create') }}" class="btn btn-primary" style="margin-left: auto;">Add New</a>
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
                        <th>NPK</th>
                        <th>NAME</th>
                        <th>POSISI</th>
                        <th>NOMOR HP</th>
                        <th>ALAMAT</th>
                        <th>JENIS KELAMIN</th>
                        <th>PHOTO</th>
                        {{-- <th>TTD</th> --}}
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->npk }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->posisi }}</td>
                            <td>{{ $item->nomor_hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>
                                <img class="img-thumbnail img-fluid" width=75px" height=75px"
                                    src="{{ asset('storage/' . $item->photo) }}" alt="User profile picture">
                            </td>
                            {{-- <td>
                                <img class="img-thumbnail img-fluid" width="75px" height="75px"
                                    src="{{ asset('storage/' . $item->ttd) }}" alt="User profile picture">
                            </td> --}}
                            <td>
                                <a href="karyawan/edit/{{ $item->id }}" class="btn btn-primary">Edit</a>
                                <a href="karyawan/show/{{ $item->id }}" class="btn btn-secondary">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal for each karyawan -->
    </div>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert-success").fadeOut('slow');
            }, 3000); // Waktu dalam milidetik, 3000 milidetik = 3 detik
        });
    </script>
@endsection
