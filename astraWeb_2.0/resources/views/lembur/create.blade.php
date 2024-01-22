@extends('template.master')
@section('title', 'Create Lembur')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Lembur</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('lembur.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <select class="form-control " name="user_id" style="width: 100%;">
                        <option selected="selected">Pilih nama karyawan</option>
                        @foreach ($karyawan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Lembur</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                </div>
                <div class="form-group">
                    <label for="mulai_lembur">Jam mulai lembur</label>
                    <input type="time" class="form-control" id="mulai_lembur" name="mulai_lembur">
                </div>
                <div class="form-group">
                    <label for="selesai_lembur">Jam selesai lembur</label>
                    <input type="time" class="form-control" id="selesai_lembur" name="selesai_lembur">
                </div>
                <div class="form-group">
                    <label for="status">HB/HL</label>
                    <select class="form-control" id="status" name="status">
                        <option value="hari_biasa">Hari biasa</option>
                        <option value="hari_libur">Hari libur</option>
                        <option value="hari_libur_besar">Hari libur besar</option>
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
