@extends('template.master')
@section('title', 'Create Lowongan')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('lowongan.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_lowongan">Nama Lowongan</label>
                    <input type="text" class="form-control" id="nama_lowongan" placeholder="masukkan lowongan"
                        name="nama_lowongan">
                </div>
                <div class="form-group">
                    <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                    <input type="text" class="form-control" id="jenis_pekerjaan" placeholder="pegawai tetap atau kontrak"
                        name="jenis_pekerjaan">
                </div>
                <div class="form-group">
                    <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                    <textarea class="form-control" id="summernote" name="deskripsi_pekerjaan" rows="4"
                        placeholder="Deskripsi pekerjaan"></textarea>
                </div>
                <div class="form-group">
                    <label for="persyaratan">Persyaratan</label>
                    <textarea class="form-control" id="summernote2" name="persyaratan" rows="4" placeholder="Persyaratan pekerjaan"></textarea>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
    </div>
@endsection
