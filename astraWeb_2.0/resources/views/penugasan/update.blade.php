@extends('template.master')
@section('title', 'Upadte Penugasan')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('penugasan.update', ['penugasan' => $penugasan->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <select class="form-control select2" name="karyawan_id" style="width: 100%;">
                        <option selected="selected">Pilih nama karyawan</option>
                        @foreach ($karyawans as $item)
                            <option value="{{ $item->id }}"
                                {{ old('karyawan_id', $penugasan->karyawan_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_penugasan">Perihal</label>
                    <input type="text" class="form-control" id="nama_penugasan" placeholder="Perihal"
                        name="nama_penugasan" value="{{ old('nama_penugasan') ?? $penugasan->nama_penugasan }}">
                </div>
                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai Penugasan</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                        value="{{ old('tanggal_mulai') ?? $penugasan->tanggal_mulai }}">
                </div>
                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Selesai Penugasan</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai"
                        value="{{ old('tanggal_selesai') ?? $penugasan->tanggal_selesai }}">
                </div>
                <div class="form-group">
                    <label for="alasan">Keterangan</label>
                    <input type="text" class="form-control" id="alasan" placeholder="Keterangan" name="alasan"
                        value="{{ old('alasan') ?? $penugasan->alasan }}">
                </div>
                <div class="form-group">
                    <div class="btn btn-default btn-file">
                        <i class="fas fa-paperclip"><span id="fileName">Unggah File</span></i>
                        <input type="file" name="file" id="fileInput">
                        <input type="hidden" name="old_file" value="{{ $penugasan->file }}">
                    </div>
                    <p class="help-block">Max. 32MB</p>
                    <!-- Elemen untuk menampilkan nama file -->
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('fileInput').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            document.getElementById('fileName').textContent = fileName;
        });
    </script>

@endsection
