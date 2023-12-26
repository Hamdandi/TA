@extends('template.master')
@section('title', 'Jenis Cuti')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Manajemen Jenis Cuti</h3>
            <a href="{{ url('jenis-cuti/create') }}" class="btn btn-primary">Add New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>JATAH CUTI TAHUNAN</th>
                        <th>JATAH CUTI BESAR</th>
                        <th>JATAH CUTI BERSALIN</th>
                        <th>JATAH CUTI DILUAR PERUSAHAAN</th>
                        <th>JATAH CUTI PERNIKAHAN</th>
                        <th>JATAH CUTI KELAHIRAN</th>
                        <th>JATAH CUTI KEMATIAN</th>
                        <th>JATAH CUTI KHITANAN</th>
                        <th>JATAH CUTI UJIAN KESERJANAAN</th>
                        <th>JATAH CUTI KEPENTINGAN</th>
                        <th>JATAH CUTI NASIONAL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenis_cutis as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- <td>{{ $item->karyawan->nama }}</td> --}}
                            <td>{{ $item->jatah_cuti_tahunan }}</td>
                            <td>{{ $item->jatah_cuti_besar }}</td>
                            <td>{{ $item->jatah_cuti_bersalin }}</td>
                            <td>{{ $item->jatah_cuti_diluar_perusahaan }}</td>
                            <td>{{ $item->jatah_cuti_pernikahan }}</td>
                            <td>{{ $item->jatah_cuti_kelahiran }}</td>
                            <td>{{ $item->jatah_cuti_kematian }}</td>
                            <td>{{ $item->jatah_cuti_khitanan }}</td>
                            <td>{{ $item->jatah_cuti_ujian_keserjanaan }}</td>
                            <td>{{ $item->jatah_cuti_kepentingan }}</td>
                            <td>{{ $item->jatah_cuti_nasional }}</td>
                            <td>
                                <a href="register/edit/{{ $item->id }}" class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
