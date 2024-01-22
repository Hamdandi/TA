@extends('template.master')
@section('title', 'Update Pelatihan')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit data pelatihan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('pelatihan.update', ['pelatihan' => $pelatihan->id]) }}">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <select class="form-control " name="karyawan_id" style="width: 100%;">
                        <option selected="selected">Pilih nama karyawan</option>
                        @foreach ($karyawans as $item)
                            <option value="{{ $item->id }}"
                                {{ old('karyawan_id', $pelatihan->karyawan_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_pelatihan">Nama Pelatihan</label>
                    <input type="text" class="form-control" id="nama_pelatihan" placeholder="Nama Pelatihan yang diikuti"
                        name="nama_pelatihan" value="{{ old('nama_pelatihan') ?? $pelatihan->nama_pelatihan }}">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
