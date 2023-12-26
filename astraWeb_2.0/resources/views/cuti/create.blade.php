@extends('template.master')
@section('title', 'Create Cuti')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('cuti.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Jenis Cuti</label>
                    <select class="form-control select2" name="jenis_cuti_id" style="width: 100%;">
                        <option selected="selected">Pilih cuti yang ingin di ambil</option>
                        @foreach ($jenis_cutis as $item)
                            <option value="{{ $item->id }}">{{ $item->jenis_cuti }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai Cuti</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                </div>
                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Selesai Cuti</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                </div>
                <div class="form-group">
                    <label for="jumlah_hari">Jumlah cuti yang diambil</label>
                    <input type="text" class="form-control" id="jumlah_hari" placeholder="jumlah cuti yang diambil"
                        name="jumlah_hari">
                </div>
                <div class="form-group">
                    <label for="alasan">Alasan mengajukan cuti</label>
                    <input type="text" class="form-control" id="alasan" placeholder="alasan mengajukan cuti"
                        name="alasan">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
