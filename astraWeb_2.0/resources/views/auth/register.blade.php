@extends('template.master')
@section('title', 'Register')
@section('content')
    <div class="card p-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title"><strong>Manajemen Users</strong></h2>
            <a href="{{ url('register/create') }}" class="btn btn-primary" style="margin-left: auto;">Add New</a>
        </div>

        <!-- /.card-header -->
        <div class="card-body p-3">
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
            <table id="example1" class="table table-bordered table-striped p-3">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>username</th>
                        <th>EMAIL</th>
                        <th>ROLE</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>
                                @if ($item->is_active == 1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                            <td>
                                <a href="register/edit/{{ $item->id }}" class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
