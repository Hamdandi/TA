<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astra Isuzu Palembang</title>
    <!-- Bootstrap 5 CSS -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .navbar-custom {
            background-color: #333;
        }

        .navbar-custom .navbar-brand img {
            max-height: 60px;
        }

        .navbar-toggler {
            border: none;
        }

        section {
            padding: 40px 0;
        }

        .about-section .icon {
            display: block;
            margin: auto;
            width: 80px;
            height: 80px;
        }

        .about-section h2,
        .about-section h3,
        .business-text h2 {
            color: #d00000;
            margin-bottom: 0.5rem;
        }

        .about-section p,
        .business-text p {
            color: #666;
            font-size: 1rem;
        }

        .btn-danger {
            background-color: #d00000;
            border: none;
        }

        .btn-danger:hover {
            background-color: #bb0000;
        }

        .modal-content {
            border-radius: 0.5rem;
        }

        .business-section .business-text {
            padding-left: 2rem;
        }

        @media (max-width: 768px) {
            .business-section .business-text {
                padding-left: 1rem;
            }
        }

        .content h2 {
            color: #d00000;
            margin-bottom: 1rem;
        }

        .content .card {
            border: 1px solid #ddd;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
        }

        .content .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .content .card-title {
            color: #333;
            font-size: 1.25rem;
        }

        .content .card-body {
            padding: 1rem;
        }

        .content .badge {
            background-color: #ffc107;
            color: #212529;
            margin-bottom: 1rem;
        }

        .content .apply-button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            margin-top: 1rem;
        }

        .content .apply-button:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .content .card {
                border: none;
                border-bottom: 1px solid #ddd;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom bg-white shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('dist/img/R.png') }}" alt="Logo" width="100px" height="100px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-danger ms-3" href="{{ url('/login') }}">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="business-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="business-text">
                        <h2>WHAT BUSINESS ARE WE IN</h2>
                        <p>Dealer kendaraan CV dan distributor kendaraan LCV serta menyediakan produk dan layanan after
                            sales isuzu</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('dist/img/mobil_1.jpg') }}" alt="Astra Isuzu Building" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <section class="business-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img class="img-fluid rounded" src="{{ asset('dist/img/mobil_1.jpg') }}" alt="Building">
                </div>
                <div class="col-md-6">
                    <div class="business-text">
                        <h2>VISI</h2>
                        <p>Menjadi salah satu distributor LCV dan dealer Isuzu dengan pengelolaan terbaik...</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="business-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="business-text">
                        <h2>MISI</h2>
                        <p>Menyediakan produk berkualitas tinggi yang memenuhi kebutuhan konsumen dan memastikan
                            kepuasan pelanggan melalui layanan purna jual yang luar biasa...</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid rounded" src="{{ asset('dist/img/mobil2.jpg') }}" alt="Mission Image">
                </div>
            </div>
        </div>
    </section>


    <section class="about-section">
        <div class="container">
            <h2 class="text-center">Sekilas Astra Isuzu</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('dist/img/contract.svg') }}" alt="Berdiri Pada Tahun 1990" class="icon">
                    <h3>Berdiri Pada Tahun 1990</h3>
                    <p>PT. Astra International Tbk. - Isuzu Sales Operation atau biasa disebut Astra Isuzu merupakan
                        jaringan jasa penjualan, perawatan, dan perbaikan serta penyediaan suku cadang produk Isuzu,
                        yang berdiri pada tahun 1990.</p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{ asset('dist/img/work.svg') }}" alt="Dealer Isuzu Terbesar" class="icon">
                    <h3>Dealer Isuzu Terbesar</h3>
                    <p>Saat ini Astra Isuzu merupakan dealer Isuzu terbesar di Indonesia yang menguasai sekitar 45% dari
                        total penjualan Isuzu.</p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{ asset('dist/img/agreement.svg') }}" alt="Kerjasama dengan 2.297 Partshop"
                        class="icon">
                    <h3>Kerjasama dengan 2.297 Partshop</h3>
                    <p>Astra Isuzu saat ini memiliki 52 outlet yang tersebar di hampir seluruh Indonesia.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <h2 class="text-center">Sekilas Astra Isuzu</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="col-12 position-relative" id="accordion">
                @foreach ($lowongans as $index => $item)
                    <div class="card card-primary card-outline card-custom" data-lowongan-id="{{ $item->id }}">
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
    <!-- Bootstrap 5 JS bundle -->

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
                <form method="POST" action="{{ route('lamaran.store') }}" enctype="multipart/form-data">
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
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
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
                                <option value="menikah">Menikah</option>
                                <option value="belum menikah">Belum Menikah</option>
                                <option value="janda/duda">Janda/Duda</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="akun_media">Akun Media Sosial</label>
                            <input type="text" class="form-control" id="akun_media" name="akun_media">
                        </div>
                        <div class="row">
                            <div class="form-gropu">
                                <div class="btn btn-default btn-file">
                                    <i class="fas fa-paperclip resumeFileName"></i> Resume
                                    <input type="file" id="resume" name="resume">
                                </div>
                                <p id="resumeFileName"></p> <!-- Label to display selected file name -->
                            </div>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fas fa-paperclip photoFileName"></i> Photo
                                    <input type="file" id="photo" name="photo">
                                </div>
                                <p id="photoFileName"></p> <!-- Label to display selected file name -->
                            </div>
                        </div>
                        <p class="help-block">Max. 32MB</p>
                        <input type="hidden" id="lowongan_id" name="lowongan_id" value="">


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

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var applyButtons = document.querySelectorAll('.apply-button');
            applyButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var lowonganId = this.closest('.card').getAttribute('data-lowongan-id');
                    document.getElementById('lowongan_id').value = lowonganId;
                });
            });
        });
    </script>

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

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert-success").fadeOut('slow');
            }, 10000); // Waktu dalam milidetik, 3000 milidetik = 3 detik
        });
    </script>
</body>

</html>
