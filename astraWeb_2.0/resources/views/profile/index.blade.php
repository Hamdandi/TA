@extends('template.master')
@section('title', 'Profile')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('storage/' . $karyawan->photo) }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $karyawan->nama }}</h3>

                        <p class="text-muted text-center">{{ $karyawan->posisi }}</p>

                        <a href="#" class="btn btn-primary btn-block"><b>Chance Password</b></a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Nomor Handphone/Whatsapp</strong>
                                    <p class="text-muted">{{ $karyawan->nomor_hp }}</p>
                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                    <p class="text-muted">{{ $karyawan->alamat }}</p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Jenis Kelamin</strong>

                                    <p class="text-muted">
                                        {{ $karyawan->jenis_kelamin }}
                                    </p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Tampat Lahir</strong>

                                    <p class="text-muted">{{ $karyawan->tempat_lahir }}</p>
                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Tanggal Lahir</strong>

                                    <p class="text-muted">{{ $karyawan->tanggal_lahir }}</p>
                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> N.I.K</strong>

                                    <p class="text-muted">{{ $karyawan->nip }}</p>
                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Tanda Tangan</strong>

                                    <p class="text-muted">
                                        <img src="{{ asset('storage/' . $karyawan->ttd) }}" alt="tanda tangan karywan">
                                    </p>
                                </div>
                            </div>

                            <div class="tab-pane" id="settings">
                                <form method="POST" action="{{ route('profile.update', ['karyawan' => $karyawan->id]) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama" placeholder="Nama"
                                                name="nama" value="{{ old('nama') ?? $karyawan->nama }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nip" class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nip" placeholder="nik"
                                                name="nip" readonly value="{{ old('nip') ?? $karyawan->nip }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="posisi" placeholder="posisi"
                                                name="posisi" readonly value="{{ old('posisi') ?? $karyawan->posisi }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor
                                            HandPhone/Whatsapp</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nomor_hp" placeholder="Nomor Hp"
                                                name="nomor_hp" value="{{ old('nomor_hp') ?? $karyawan->nomor_hp }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="alamat" placeholder="alamat" name="alamat">{{ old('alamat') ?? $karyawan->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="tempat_lahir" placeholder="tempat_lahir" name="tempat_lahir">{{ old('tempat_lahir') ?? $karyawan->tempat_lahir }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control datetimepicker-input"
                                                data-target="#reservationdate" name="tanggal_lahir"
                                                value="{{ old('tanggal_lahir') ?? $karyawan->tanggal_lahir }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ttd" class="col-sm-2 col-form-label">Tanda Tanggan</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ttd"
                                                    name="ttd">
                                                <input type="hidden" name="old_file" value="{{ $karyawan->ttd }}">
                                                <label class="custom-file-label" for="ttd" id="ttdFileName">Upload
                                                    file tanda-tangan karyawan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="photo" class="col-sm-2 col-form-label">Photo Profile</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo"
                                                    name="photo">
                                                <input type="hidden" name="old_file" value="{{ $karyawan->photo }}">
                                                <label class="custom-file-label" for="photo" id="photoFileName">Upload
                                                    photo profile</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('ttd').addEventListener('change', function(event) {
                if (event.target.files.length > 0) {
                    document.getElementById('ttdFileName').textContent = event.target.files[0].name;
                }
            });

            document.getElementById('photo').addEventListener('change', function(event) {
                if (event.target.files.length > 0) {
                    document.getElementById('photoFileName').textContent = event.target.files[0].name;
                }
            });
        });
    </script>

@endsection
