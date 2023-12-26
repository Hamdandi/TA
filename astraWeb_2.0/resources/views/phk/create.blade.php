@extends('template.master')
@section('title', 'Create Punishment')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('phk.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Minimal</label>
                    <select class="form-control select2" name="karyawan_id" style="width: 100%;">
                        {{-- <option selected="selected">Pilih Karyawan</option> --}}
                        @foreach ($karyawans as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" placeholder="Enter email" name="keterangan">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
