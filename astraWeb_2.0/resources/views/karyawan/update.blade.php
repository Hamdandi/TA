@extends('template.master')
@section('title', 'Update Karyawan')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Karyawan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('karyawan.update', ['karyawan' => $karyawan->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label>Username</label>
                    <select class="form-control " name="user_id" style="width: 100%;">
                        <option selected="selected">Pilih Karyawan</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama</label>
                    <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama Karyawan"
                        name="nama_lengkap" value="{{ old('nama_lengkap') ?? $karyawan->nama_lengkap }}">
                </div>
                <div class="form-group">
                    <label for="npk">NPK</label>
                    <input type="text" class="form-control" id="npk" placeholder="Nomor Induk Karyawan"
                        name="npk" value="{{ old('npk') ?? $karyawan->npk }}">
                </div>
                <div class="form-group">
                    <label for="posisi">Posisi</label>
                    <input type="text" class="form-control" id="posisi" placeholder="posisi/jabatan" name="posisi"
                        value="{{ old('posisi') ?? $karyawan->posisi }}">
                </div>
                <div class="form-group">
                    <label for="nomor_hp">Nomor Hp</label>
                    <input type="text" class="form-control" id="nomor_hp" placeholder="nomor handphone/whatsapp"
                        name="nomor_hp" value="{{ old('nomor_hp') ?? $karyawan->nomor_hp }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" placeholder="alamat lengkap" name="alamat"
                        value="{{ old('alamat') ?? $karyawan->alamat }}">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" placeholder="masukan tempat lahir karyawan"
                        name="tempat_lahir" value="{{ old('tempat_lahir') ?? $karyawan->tempat_lahir }}">
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate"
                            name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $karyawan->tanggal_lahir }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="akun_media">Akun Media Sosial</label>
                    <input type="text" class="form-control" id="akun_media" placeholder="contoh : ig :@karyawan"
                        name="akun_media" value="{{ old('akun_media') ?? $karyawan->tempat_lahir }}">
                </div>
                <div class="form-group">
                    <label for="nama_sekolah">Nama Sekolah/Kampus</label>
                    <input type="text" class="form-control" id="nama_sekolah" placeholder="Contoh: universitas xyz"
                        name="nama_sekolah" value="{{ old('nama_sekolah') ?? $karyawan->tempat_lahir }}">
                </div>
                <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    <input type="text" class="form-control" id="pendidikan" placeholder="contoh : S1 " name="pendidikan"
                        value="{{ old('pendidikan') ?? $karyawan->tempat_lahir }}">
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" placeholder="Contoh : Teknik Informasi"
                        name="jurusan" value="{{ old('jurusan') ?? $karyawan->tempat_lahir }}">
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

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
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
