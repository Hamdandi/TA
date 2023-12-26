@extends('template.master')
@section('title', 'Cuti')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Manajemen Cuti</h3>
            @if (
                $cutis->contains(function ($cuti) {
                    return $cuti->status == 'menunggu';
                }))
                <span class="badge badge-warning">Menunggu</span>
            @else
                <a href="{{ url('cuti/create') }}" class="btn btn-primary">Add New</a>
            @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA KARYAWAN</th>
                        <th>JENIS CUTI</th>
                        <th>TANGGAL MULAI</th>
                        <th>TANGGAL SELESAI</th>
                        <th>JUMLAH HARI</th>
                        <th>SISA CUTI</th>
                        <th>ALASAN</th>
                        <th>STATUS</th>
                        <th>KETERANGAN</th>
                        <th>Aksi</th> <!-- Kolom untuk tombol verifikasi -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cutis as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->karyawan->nama }}</td>
                            <td>{{ $item->jenis_cuti->jenis_cuti }}</td>
                            <td>{{ $item->tanggal_mulai }}</td>
                            <td>{{ $item->tanggal_selesai }}</td>
                            <td>{{ $item->jumlah_hari }}</td>
                            <td>{{ $item->sisa_cuti }}</td>
                            <td>{{ $item->alasan }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                <button class="btn btn-warning btn-edit" data-id="{{ $item->id }}">Edit</button>
                                <form action="{{ url('cuti/' . $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



        <div class="modal fade" id="read-karyawan-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        {{-- Modal Edit Status Cuti --}}
        <div class="modal fade" id="edit-cuti-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="">
                        @csrf
                        @method('PATCH')

                        <div class="modal-header">
                            <h4 class="modal-title">Edit Status Cuti</h4>
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
                                </select>
                            </div>

                            {{-- Field untuk keterangan --}}
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
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
        <!-- /.card-body -->
    </div>


    <script>
        $(document).on('click', '.btn-edit', function() {
            var cutiId = $(this).data('id');

            // Buat AJAX request untuk mendapatkan data cuti berdasarkan cutiId
            $.get('{{ route('cuti.edit', '') }}/' + cutiId, function(data) {
                // Isi modal dengan data yang diterima
                $('#edit-cuti-modal #status').val(data.status);
                $('#edit-cuti-modal #keterangan').val(data.keterangan);

                // Update action form modal
                $('#edit-cuti-modal form').attr('action', '{{ route('cuti.update', '') }}/' + cutiId);

                // Tampilkan modal
                $('#edit-cuti-modal').modal('show');
            });
        });
    </script>

@endsection
