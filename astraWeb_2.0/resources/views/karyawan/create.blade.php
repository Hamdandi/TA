@extends('template.master')
@section('title', 'Create Karyawan')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('karyawan.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Username</label>
                    <select class="form-control select2" name="user_id" style="width: 100%;">
                        <option selected="selected">Pilih Karyawan</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama Karyawan" name="nama">
                </div>
                <div class="form-group">
                    <label for="nip">NIK</label>
                    <input type="text" class="form-control" id="nip" placeholder="Nomor Induk Karyawan"
                        name="nip">
                </div>
                <div class="form-group">
                    <label for="posisi">Posisi</label>
                    <input type="text" class="form-control" id="posisi" placeholder="posisi/jabatan" name="posisi">
                </div>
                <div class="form-group">
                    <label for="nomor_hp">Nomor Hp</label>
                    <input type="text" class="form-control" id="nomor_hp" placeholder="nomor handphone/whatsapp"
                        name="nomor_hp">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" placeholder="alamat lengkap" name="alamat">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" placeholder="masukan tempat lahir karyawan"
                        name="tempat_lahir">
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate"
                            name="tanggal_lahir">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ttd">Tanda Tangan</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="ttd">
                            <label class="custom-file-label" for="ttd">Upload file tanda-tangan karyawan</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo">
                            <label class="custom-file-label" for="photo">Upload Photo Karyawan</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
