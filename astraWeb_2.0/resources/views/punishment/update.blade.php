@extends('template.master')
@section('title', 'Update Punishment')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('punishment.update', ['punishment' => $punishment->id]) }}">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <select class="form-control select2" name="karyawan_id" style="width: 100%;">
                        <option selected="selected">Pilih nama karyawan</option>
                        @foreach ($karyawans as $item)
                            <option value="{{ $item->id }}"
                                {{ old('karyawan_id', $punishment->karyawan_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" placeholder="masukkan Jatah Cuti"
                        name="keterangan" value="{{ old('keterangan') ?? $punishment->keterangan }}">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
