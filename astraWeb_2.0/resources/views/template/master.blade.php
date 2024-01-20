<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/dropzone/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/toastr/toastr.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-bs4.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar wider sidebar-dark-primary elevation-4 bg-indigo">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link d-flex flex-column align-items-center">
                <div class="logo-wrapper">
                    <img src="{{ asset('dist/img/R.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="background: white">
                </div>
                <span class="brand-text font-weight-light"><strong> Astra Isuzu Palembang</strong></span>
            </a>


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if (Auth::user() && Auth::user()->karyawan && Auth::user()->karyawan->photo)
                            <img src="{{ asset('storage/' . Auth::user()->karyawan->photo) }}" class=""
                                width="100px" height="100px" alt="User Image">
                        @else
                            <img src="{{ asset('path/to/default-image.jpg') }}" class="img-circle elevation-2"
                                alt="Default User Image">
                        @endif
                    </div>
                    <div class="info">
                        @if (Auth::user() && Auth::user()->karyawan)
                            <!-- Hyperlink ke halaman edit profil pengguna yang login -->
                            <a href="{{ route('profile.index', ['profile' => Auth::user()->id]) }}"
                                class="d-block">{{ Auth::user()->karyawan->nama_lengkap }}</a>
                        @else
                            <a href="#" class="d-block">Guest</a>
                        @endif
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}"
                                class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        @if (Auth::user()->role == 'hrd' || Auth::user()->role == 'kepala cabang')
                            <li
                                class="nav-item {{ request()->is('register*') || request()->is('karyawan*') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->is('register*') || request()->is('karyawan*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Master Data
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview"
                                    style="{{ request()->is('register*') || request()->is('karyawan*') ? 'display: block;' : 'display: none;' }}">
                                    <li class="nav-item">
                                        <a href="{{ url('/register') }}"
                                            class="nav-link {{ request()->is('register*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/karyawan') }}"
                                            class="nav-link {{ request()->is('karyawan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Karyawan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if (Auth::user()->role == 'hrd' || Auth::user()->role == 'kepala cabang')
                            <li
                                class="nav-item {{ request()->is('lowongan*') || request()->is('lamaran*') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->is('lowongan*') || request()->is('lamaran*') ? 'display:block;' : 'display:none;' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Rekrutmen
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview"
                                    style="{{ request()->is('lowongan*') || request()->is('lamaran*') ? 'display:block;' : 'display:none;' }}">
                                    <li class="nav-item">
                                        <a href="{{ url('/lowongan') }}"
                                            class="nav-link {{ request()->is('lowongan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Lowongan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/lamaran') }}"
                                            class="nav-link {{ request()->is('lamaran*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Lamaran</p>
                                        </a>
                                    </li>
                                    <!-- More items... -->
                                </ul>
                            </li>
                        @endif

                        <!-- Presensi Dropdown -->
                        <li
                            class="nav-item {{ request()->is('presensi*') || request()->is('jenis-cuti*') || request()->is('cuti*') || request()->is('lembur*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('presensi*') || request()->is('jenis-cuti*') || request()->is('cuti*') || request()->is('lembur*') ? 'display:block;' : 'display:none;' }}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Presensi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                style="{{ request()->is('presensi*') || request()->is('jenis-cuti*') || request()->is('cuti*') || request()->is('lembur*') ? 'display:block;' : 'display:none;' }}">
                                @if (Auth::user()->role == 'hrd' || Auth::user()->role == 'kepala cabang')
                                    <li class="nav-item">
                                        <a href="{{ url('/presensi') }}"
                                            class="nav-link {{ request()->is('presensi*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Rekap Presensi</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/jenis-cuti') }}"
                                            class="nav-link {{ request()->is('jenis-cuti*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Jenis Cuti
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/cuti') }}"
                                            class="nav-link {{ request()->is('cuti*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Cuti
                                            </p>
                                        </a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a href="{{ url('/cuti/karyawan') }}"
                                        class="nav-link {{ request()->is('cuti/karyawan*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Cuti karaywan
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/lembur') }}"
                                        class="nav-link {{ request()->is('lembur*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Lembur
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Lain - lain Dropdown -->
                        <li
                            class="nav-item {{ request()->is('penugasan*') || request()->is('pelatihan*') || request()->is('reward*') || request()->is('punishment*') || request()->is('phk*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('penugasan*') || request()->is('pelatihan*') || request()->is('reward*') || request()->is('punishment*') || request()->is('phk*') ? 'display:block;' : 'display:none;' }}"
                                data-bs-toggle="collapse" data-bs-target="#lainDropdown" aria-expanded="false">
                                <i class="nav-icon fas fa-ellipsis-h"></i>
                                <p>
                                    Lain - lain
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/penugasan') }}"
                                        class="nav-link {{ request()->is('penugasan*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Penugasan
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/penugasan/karyawan') }}"
                                        class="nav-link {{ request()->is('penugasan/karyawan*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Penugasan Karyawan
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/pelatihan') }}"
                                        class="nav-link {{ request()->is('pelatihan*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Pelatihan
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/pelatihan/karyawan') }}"
                                        class="nav-link {{ request()->is('pelatihan/karyawan*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Pelatihan karyawan
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/reward') }}"
                                        class="nav-link {{ request()->is('reward*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Reward</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/reward/karyawan') }}"
                                        class="nav-link {{ request()->is('reward/karyawan*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Reward Karyawan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/punishment') }}"
                                        class="nav-link {{ request()->is('punishment*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Punishment
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/punishment/karyawan') }}"
                                        class="nav-link {{ request()->is('punishment/karyawan*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Punishment Karyawan
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/phk') }}"
                                        class="nav-link {{ request()->is('phk*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            PHK
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>


                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content p-2">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        {{-- <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All
            rights
            reserved.
        </footer> --}}

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ '/plugins/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        $(function() {

            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            $(document).ready(function() {
                $('#summernote').summernote();
                $('#summernote2').summernote();
            });

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

        });
    </script>
</body>

</html>
