@extends('template.master')
@section('title', 'Create User')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('register.update', ['user' => $user->id]) }}">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input disabled type="text" class="form-control" id="name" placeholder="Enter your name"
                        name="name" value="{{ old('name') ?? $user->username }}">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input disabled type="email" class="form-control" id="email" placeholder="Enter email"
                        name="email" value="{{ old('name') ?? $user->email }}">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="karyawan">Karyawan</option>
                        <option value="hrd">HRD</option>
                        <option value="kepala cabang">Kepala Cabang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="in_active">Status</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
