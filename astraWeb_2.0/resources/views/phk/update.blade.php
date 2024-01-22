@extends('template.master')
@section('title', 'Update PHK')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit data PHK</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('phk.update', ['phk' => $phk->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>Nama HRD</label>
                    <select class="form-control " name="karyawan_id" style="width: 100%;">
                        <option selected="selected">Pilih nama HRD</option>
                        @foreach ($karyawans as $item)
                            <option value="{{ $item->id }}"
                                {{ old('karyawan_id', $phk->karyawan_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <textarea id="summernote" class="form-control" style="height: 300px" name="keterangan">{{ old('keterangan') ?? $phk->keterangan }}</textarea>
                </div>
                <div class="form-group">
                    <div class="btn btn-default btn-file">
                        <i class="fas fa-paperclip"><span id="fileName">Unggah File</span></i>
                        <input type="file" name="file" id="fileInput">
                        <input type="hidden" name="old_file" value="{{ $phk->file }}">
                    </div>
                    <p class="help-block">Max. 32MB</p>
                    <!-- Elemen untuk menampilkan nama file -->
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i>
                        Draft</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>
                        Send</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
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
