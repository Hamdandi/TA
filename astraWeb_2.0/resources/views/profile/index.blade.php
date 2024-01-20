@extends('template.master')
@section('title', 'Profile')
@section('content')
    <div class="container-fluid p-3">
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

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-danger btn-block" value="Logout"
                                onclick="return confirm('Are you sure?')">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#activity">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit-karyawan') }}">Edit
                                    Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.change-password') }}">Change
                                    Password</a>
                            </li>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
