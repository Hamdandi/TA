<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astra Isuzu Palembang</title>
    <!-- Bootstrap 5 CSS -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <style>
        .navbar-custom {
            background-color: #ffffff;
        }

        .navbar-custom .navbar-brand img {
            height: 50px;
        }

        .hero-section {
            position: relative;
            background: url('path-to-your-hero-image.jpg') center center no-repeat;
            background-size: cover;
            height: 400px;
        }

        .hero-text-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .product-section {
            padding: 2rem 0;
        }

        .product-card img {
            height: 150px;
            /* Fixed height for consistency */
            object-fit: contain;
            /* To make sure the product images fit well */
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom bg-dark">
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
    <!-- Products Section -->
    <section class="slide-section">
        <div class="container">
            <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('dist/img/bener1.jpg') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('dist/img/bener.jpg') }}"
                                alt="Second
                                slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('dist/img/bener3.jpg') }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-custom-icon" aria-hidden="true">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-custom-icon" aria-hidden="true">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="product-section">
        <div class="container">
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural
                                    lead-in to additional content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
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
