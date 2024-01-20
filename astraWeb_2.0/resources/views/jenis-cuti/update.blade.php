@extends('template.master')
@section('title', 'Upddate Jatah Cuti')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Jenis Cuti</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('jenis-cuti.update', ['jenis_cuti' => $jenis_cuti->id]) }}">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="jenis_cuti">Jenis Cuti</label>
                    <input type="text" class="form-control" id="jenis_cuti" placeholder="Masukkan Jenis Cuti"
                        name="jenis_cuti" value="{{ old('jenis_cuti') ?? $jenis_cuti->jenis_cuti }}">
                </div>
                <div class="form-group">
                    <label for="jatah_cuti">Jatah Cuti</label>
                    <input type="text" class="form-control" id="jatah_cuti" placeholder="masukkan Jatah Cuti"
                        name="jatah_cuti" value="{{ old('jatah_cuti') ?? $jenis_cuti->jatah_cuti }}">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
