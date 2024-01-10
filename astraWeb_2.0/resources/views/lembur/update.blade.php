@extends('template.master')
@section('title', 'Edit Lembur')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Lembur</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('lembur.update', $lembur->id) }}">
            @csrf
            @method('PATCH') <!-- Specify the HTTP method as PUT -->
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <select class="form-control select2" name="user_id" style="width: 100%;">
                        @foreach ($karyawan as $item)
                            <option value="{{ $item->id }}" {{ $lembur->user_id == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Lembur</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $lembur->tanggal }}">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                        value="{{ $lembur->keterangan }}">
                </div>
                <div class="form-group">
                    <label for="mulai_lembur">Jam mulai lembur</label>
                    <input type="time" class="form-control" id="mulai_lembur" name="mulai_lembur"
                        value="{{ date('H:i', strtotime($lembur->mulai_lembur)) }}">
                </div>
                <div class="form-group">
                    <label for="selesai_lembur">Jam selesai lembur</label>
                    <input type="time" class="form-control" id="selesai_lembur" name="selesai_lembur"
                        value="{{ date('H:i', strtotime($lembur->selesai_lembur)) }}">
                </div>
                <div class="form-group">
                    <label for="status">HB/HL</label>
                    <select class="form-control" id="status" name="status">
                        <option value="hari_biasa" {{ $lembur->status === 'hari_biasa' ? 'selected' : '' }}>Hari biasa
                        </option>
                        <option value="hari_libur" {{ $lembur->status === 'hari_libur' ? 'selected' : '' }}>Hari libur
                        </option>
                        <option value="hari_libur_besar" {{ $lembur->status === 'hari_libur_besar' ? 'selected' : '' }}>
                            Hari libur besar</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
