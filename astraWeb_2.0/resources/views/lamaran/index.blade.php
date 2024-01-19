@extends('template.master')
@section('title', 'Lamaran')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">List Lamaran Pekekerja</h3>
            <a href="{{ url('lamaran/create') }}" class="btn btn-primary">Add New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID LOWONGAN</th>
                        <th>NAMA PELAMAR</th>
                        <th>EMAIL</th>
                        <th>NOMOR HP</th>
                        <th>ALAMAT</th>
                        <th>JENIS KELAMIN</th>
                        <th>NAMA SEKOLAH/KAMPUS</th>
                        <th>PENDIDIKAN</th>
                        <th>JURUSAN</th>
                        <th>TEMPAT LAHIR</th>
                        <th>TANGGAL LAHIR</th>
                        <th>STATUS PERNIKAHAN</th>
                        <th>AKUN MEDIA</th>
                        <th>RESUME</th>
                        <th>PHOTO</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lamarans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->lowongan_id }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->nomor_hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->nama_sekolah }}</td>
                            <td>{{ $item->pendidikan }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->status_pernikahan }}</td>
                            <td>{{ $item->akun_media }}</td>
                            <td><a class="btn btn-sm btn-outline-info" href="{{ asset('storage/' . $item->resume) }}"
                                    target="_blank">Lihat</a></td>
                            <td><img class="img-thumbnail img-fluid" width="100px" height="100px"
                                    src="{{ asset('storage/' . $item->photo) }}" alt="User profile picture"></td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#edit-lamaran-modal" data-id='{{ $item->id }}'>
                                    Edit
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="edit-lamaran-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('lamaran.update', ['lamaran' => $item->id]) }}"
                    id="edit-lamaran-form">
                    @csrf
                    @method('PATCH')

                    <div class="modal-header">
                        <h4 class="modal-title">Edit Status Lamaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        {{-- Dropdown untuk status --}}
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="menunggu">Menunggu</option>
                                <option value="diterima">Diterima</option>
                                <option value="ditolak">Ditolak</option>
                                <option value="interview">Interview</option>
                                <option value="psikotes">Psikotes</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.btn-edit', function() {
            var lamaranId = $(this).data('id');

            // Buat AJAX request untuk mendapatkan data lamaran berdasarkan lamaranId
            $.get('{{ url('/lamaran') }}/' + lamaranId + '/edit', function(data) {
                // Isi modal dengan data yang diterima
                $('#edit-lamaran-modal #status').val(data.status);
                // ...isi dengan data lain jika diperlukan

                // Update action form modal
                $('#edit-lamaran-modal form').attr('action', '{{ route('lamaran.update', '') }}/' +
                    lamaranId);

                // Tampilkan modal
                $('#edit-lamaran-modal').modal('show');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert-success").fadeOut('slow');
            }, 3000); // Waktu dalam milidetik, 3000 milidetik = 3 detik
        });
    </script>


@endsection
