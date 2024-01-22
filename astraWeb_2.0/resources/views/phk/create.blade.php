@extends('template.master')
@section('title', 'Create Punishment')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah data PHK</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('phk.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <select class="form-control " name="karyawan_id" style="width: 100%;">
                        <option selected="selected" disabled>Pilih Karyawan</option>
                        @foreach ($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Keterangan PHK</label>
                    <textarea id="summernote" class="form-control" style="height: 300px" name="keterangan"></textarea>
                </div>

                <div class="form-group">
                    <label for="fileInput">Unggah File PHK (PDF)</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileInput" name="file">
                            <label class="custom-file-label" for="fileInput">Pilih file</label>
                        </div>
                    </div>
                    <p class="help-block">Max. 32MB</p>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit PHK</button>
                <button type="reset" class="btn btn-default">Reset</button>
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
