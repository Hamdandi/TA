<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Astra Isuzu Palembang</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="../../index3.html" class="navbar-brand">
                    <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Astra Isuzu Palembang</span>
                </a>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ url('/login') }}" role="button">
                            LOGIN
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h3>DAFTAR LOWONGAN PEKERJAAN</h3>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="col-12 position-relative" id="accordion">
                        @foreach ($lowongans as $index => $item)
                            <div class="card card-primary card-outline card-custom">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapse{{ $index }}">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            {{ $item->nama_lowongan }}
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapse{{ $index }}" class="collapse {{ $loop->first ? 'show' : '' }}"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-gray-800 font-semibold badge badge-warning">
                                            {{ $item->jenis_pekerjaan }}</p>
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Job Description
                                            </h3>
                                        </div>
                                        <p class="text-gray-600">{!! $item->deskripsi_pekerjaan !!}</p>
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Job Requirement
                                            </h3>
                                        </div>
                                        <p class="text-gray-700 mt-2">{!! $item->persyaratan !!}</p>
                                        <button class="btn btn-success apply-button" data-toggle="modal"
                                            data-target="#applyModal">Apply</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>

    <!-- Apply Modal -->
    <div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="applyModalLabel">Lamaran Pekerjaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('/path-to-save-lamaran') }}">
                    @csrf
                    <div class="modal-body">
                        <!-- Form fields based on lamarans schema -->
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp">Nomor Handphone/Whatsapp</label>
                            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        </div>
                        <div class="form-group">
                            <label for="nama_sekolah">Nama Sekolah/Universitas</label>
                            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah">
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" id="pendidikan" name="pendidikan">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">jurusan pendidikan terakhir</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>
                        <div class="form-group">
                            <label for="status_pernikahan">Status Pernikahan</label>
                            <select class="form-control" id="status_pernikahan" name="status_pernikahan">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="akun_media">Akun Media Sosial</label>
                            <input type="text" class="form-control" id="akun_media" name="akun_media">
                        </div>
                        <div class="row">
                            <div class="form-gropu">
                                <div class="btn btn-default btn-file">
                                    <i class="fas fa-paperclip"></i> Resume
                                    <input type="file" id="resume" name="resume">
                                </div>
                                <p id="resumeFileName"></p> <!-- Label to display selected file name -->
                            </div>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fas fa-paperclip"></i> Photo
                                    <input type="file" id="photo" name="foto">
                                </div>
                                <p id="photoFileName"></p> <!-- Label to display selected file name -->
                            </div>
                        </div>
                        <p class="help-block">Max. 32MB</p>


                        <!-- Add more fields as per your schema -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Submit Lamaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('resume').addEventListener('change', function(event) {
                document.getElementById('resumeFileName').textContent = event.target.files[0].name;
            });

            document.getElementById('photo').addEventListener('change', function(event) {
                document.getElementById('photoFileName').textContent = event.target.files[0].name;
            });
        });
    </script>

    <!-- AdminLTE for demo purposes -->
</body>

</html>
