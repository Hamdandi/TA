@extends('template.master')
@section('title', 'Jenis Cuti')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Manajemen Jenis Cuti</h3>
            <a href="{{ url('jenis-cuti/create') }}" class="btn btn-primary">Add New</a>
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
                        <th>JENIS CUTI</th>
                        <th>JATAH CUTI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenis_cutis as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->jenis_cuti }}</td>
                            <td>{{ $item->jatah_cuti }}</td>
                            <td>
                                <a href="jenis-cuti/edit/{{ $item->id }}" class="btn btn-primary">Edit</a>
                                <form action="jenis-cuti/delete/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
