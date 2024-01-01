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
                            <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">Nina Mcintire</h3>

                        <p class="text-muted text-center">Software Engineer</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            @if ($jenis_cuti->count() > 0)
                                <li class="list-group-item d-flex justify-content-between">
                                    <b class="justify-content-start">jenis cuti</b>
                                    <b class="justify-content-end">sisa cuti</b>
                                </li>

                                @foreach ($jenis_cuti as $jenis)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>{{ $jenis->jenis_cuti }}</span>
                                        <span>
                                            @php
                                                // Cari data cuti yang sesuai dengan jenis cuti saat ini
                                                $cutiSesuai = $cuti->where('jenis_cuti_id', $jenis->id)->first();

                                                // Hitung sisa cuti, jika tidak ada data cuti sesuai, maka sisa cuti sama dengan jatah cuti
                                                $sisaCuti = $cutiSesuai ? $cutiSesuai->sisa_cuti : $jenis->jatah_cuti;

                                                // Tampilkan sisa cuti
                                                echo $sisaCuti;
                                            @endphp
                                        </span>
                                    </li>
                                @endforeach
                            @else
                                <p>Tidak ada jenis cuti tersedia.</p>
                            @endif



                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Nomor Handphone/Whatsapp</strong>

                                    <p class="text-muted">
                                        08123456789
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                    <p class="text-muted">Palembang, jalan bla bla bla</p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Jenis Kelamin</strong>

                                    <p class="text-muted">
                                        Laki-laki
                                    </p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Tampat Lahir</strong>

                                    <p class="text-muted">Palembang</p>
                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Tanggal Lahir</strong>

                                    <p class="text-muted">13-13-2013</p>
                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> N.I.K</strong>

                                    <p class="text-muted">Palembang</p>
                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Tanda Tangan</strong>

                                    <p class="text-muted">Image</p>
                                </div>
                            </div>

                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Nomor
                                            HandPhone/Whatsapp</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control datetimepicker-input"
                                                data-target="#reservationdate" name="tanggal_lahir">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Tanda Tanggan</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ttd">
                                                <label class="custom-file-label" for="ttd">Upload file tanda-tangan
                                                    karyawan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Photo Profile</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ttd">
                                                <label class="custom-file-label" for="ttd">Upload file tanda-tangan
                                                    karyawan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and
                                                        conditions</a>
                                                </label>
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
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
