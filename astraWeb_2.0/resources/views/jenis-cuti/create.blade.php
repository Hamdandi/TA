@extends('template.master')
@section('title', 'Create Jatah Cuti')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Jenis Cuti</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('jenis-cuti.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="jenis_cuti">Jenis Cuti</label>
                    <input type="text" class="form-control" id="jenis_cuti" placeholder="Masukkan Jenis Cuti"
                        name="jenis_cuti">
                </div>
                <div class="form-group">
                    <label for="jatah_cuti">Jatah Cuti</label>
                    <input type="text" class="form-control" id="jatah_cuti" placeholder="masukkan Jatah Cuti"
                        name="jatah_cuti">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
