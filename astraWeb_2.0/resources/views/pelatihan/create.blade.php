@extends('template.master')
@section('title', 'Create Pelatihan')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('pelatihan.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <select class="form-control select2" name="karyawan_id" style="width: 100%;">
                        <option selected="selected">Pilih nama karyawan</option>
                        @foreach ($karyawans as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_pelatihan">Nama Pelatihan</label>
                    <input type="text" class="form-control" id="nama_pelatihan" placeholder="Nama Pelatihan yang diikuti"
                        name="nama_pelatihan">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
