@extends('template.master')
@section('title', 'Edit Karyawan')

@section('content')
    <div class="container">
        <h1>Edit Data Karyawan</h1>
        <form action="{{ route('profile.update-karyawan', ['karyawan' => $karyawan->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama_lengkap"
                    value="{{ old('nama_lengkap') ?? $karyawan->nama_lengkap }}" readonly>
            </div>
            <div class="mb-3">
                <label for="npk" class="form-label">NPK</label>
                <input type="text" class="form-control" id="npk" name="npk"
                    value="{{ old('npk') ?? $karyawan->npk }}" readonly>
            </div>
            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi</label>
                <input type="text" class="form-control" id="posisi" name="posisi"
                    value="{{ old('posisi') ?? $karyawan->posisi }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Nomor Hp</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp"
                    value="{{ old('nomor_hp') ?? $karyawan->nomor_hp }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Almat</label>
                <input type="text" class="form-control" id="alamat" name="alamat"
                    value="{{ old('alamat') ?? $karyawan->alamat }}">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                    value="{{ old('jenis_kelamin') ?? $karyawan->jenis_kelamin }}" readonly>
            </div>
            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                    value="{{ old('tempat_lahir') ?? $karyawan->tempat_lahir }}" readonly>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                    value="{{ old('tanggal_lahir') ?? $karyawan->tanggal_lahir }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_sekolah" class="form-label">Nama Sekolah/Kampus</label>
                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"
                    value="{{ old('nama_sekolah') ?? $karyawan->nama_sekolah }}" readonly>
            </div>
            <div class="mb-3">
                <label for="pendidikan" class="form-label">Pendidikan</label>
                <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                    value="{{ old('pendidikan') ?? $karyawan->pendidikan }}" readonly>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan"
                    value="{{ old('jurusan') ?? $karyawan->jurusan }}" readonly>
            </div>
            <div class="mb-3">
                <label for="akun_media" class="form-label">Akun Media Sosial</label>
                <input type="text" class="form-control" id="akun_media" name="akun_media"
                    value="{{ old('akun_media') ?? $karyawan->akun_media }}">
            </div>

            <div class="form-group">
                <label for="ttd">Tanda Tangan</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="ttd" name="ttd">
                        <label class="custom-file-label" for="ttd" id="ttdFileName">Upload file tanda-tangan
                            karyawan</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo">
                        <label class="custom-file-label" for="photo" id="photoFileName">Upload Photo
                            Karyawan</label>
                    </div>
                </div>
            </div>
            <!-- Tambahkan field lain sesuai kebutuhan -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script>
        document.getElementById('ttd').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            document.getElementById('ttdFileName').textContent = fileName;
        });

        document.getElementById('photo').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            document.getElementById('photoFileName').textContent = fileName;
        });
    </script>
@endsection
