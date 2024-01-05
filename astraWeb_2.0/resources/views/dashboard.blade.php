@extends('template.master')
@section('title', 'Dashboard')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Lamaran masuk</span>
                            <span class="info-box-number">41,410</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Data Pengajuan Cuti</span>
                            <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Karyawn</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <!-- Jenis Cuti Section -->
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <ul class="list-group list-group-unbordered mb-3">
                                @if ($jenis_cuti->count() > 0)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <b>Jenis Cuti</b>
                                        <b>Sisa Cuti</b>
                                    </li>

                                    @foreach ($jenis_cuti as $jenis)
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span>{{ $jenis->jenis_cuti }}</span>
                                            <span>
                                                @php
                                                    $cutiSesuai = $cuti->where('jenis_cuti_id', $jenis->id)->first();
                                                    $sisaCuti = $cutiSesuai ? $cutiSesuai->sisa_cuti : $jenis->jatah_cuti;
                                                    echo $sisaCuti;
                                                @endphp
                                            </span>
                                        </li>
                                    @endforeach
                                @else
                                    <p>Tidak ada jenis cuti tersedia.</p>
                                @endif
                            </ul>
                            <a href="#" class="btn btn-primary btn-block"><b>Change Password</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <!-- Visi Misi Section -->
                <div class="col-md-6">
                    <!-- Vision Card -->
                    <div class="card mb-3">
                        <div class="card-header bg-info">
                            <h3 class="card-title">VISI</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Menjadi salah satu distributor LCV dan dealer Isuzu dengan pengelolaan
                                terbaik melalui penekanan pertumbuhan yang berkelanjutan, pengembangan sumber daya manusia,
                                membangun operasional yang unggul serta memberikan layanan terbaik yang ramah lingkungan dan
                                bertanggung jawab terhadap sosial.</p>
                        </div>
                    </div>

                    <!-- Mission Card -->
                    <div class="card mb-3">
                        <div class="card-header bg-info">
                            <h3 class="card-title">MISI</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li>1. Menjadi The Most Preferred Dealer kendaraan niaga Isuzu dan Reliable LCV Distributor
                                </li>
                                <li>2. Memberikan produk dan layanan terbaik bagi seluruh pelanggan
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
