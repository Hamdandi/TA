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
                        @if (Auth::user()->role == 'hrd' || Auth::user()->role == 'kepala cabang')
                            <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cutis as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->username }}</td>
                            <td>{{ $item->jenis_cuti->jenis_cuti }}</td>
                            <td>{{ $item->tanggal_mulai }}</td>
                            <td>{{ $item->tanggal_selesai }}</td>
                            <td>{{ $item->jumlah_hari }}</td>
                            <td>{{ $item->sisa_cuti }}</td>
                            <td>{{ $item->alasan }}</td>
                            <td>
                                @if ($item->status == 'menunggu')
                                    <span class="badge badge-warning">{{ $item->status }}</span>
                                @elseif ($item->status == 'diterima')
                                    <span class="badge badge-success">{{ $item->status }}</span>
                                @elseif ($item->status == 'ditolak')
                                    <span class="badge badge-danger">{{ $item->status }}</span>
                                @else
                                    {{ $item->status }}
                                @endif
                            </td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="row">
                                @if (Auth::user()->role == 'hrd' || Auth::user()->role == 'kepala cabang')
                                    <button class="btn btn-warning btn-edit" data-id="{{ $item->id }}">Edit</button>
                                    <form action="cuti/delete/{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger delete-button" type="button" data-toggle="modal"
                                            data-target="#confirmationModalCuti"
                                            data-id="{{ $item->id }}">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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


        <div class="modal fade" id="confirmationModalCuti" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this job listing?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
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

        $(document).ready(function() {
            var deleteFormCuti;

            $('.delete-button').on('click', function() {
                deleteFormCuti = $(this).closest('form');
            });

            $('#confirmationModalCuti #confirmDelete').on('click', function() {
                deleteFormCuti.submit();

                // Menampilkan notifikasi SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Lowongan berhasil dihapus.',
                    showConfirmButton: false,
                    timer: 1500 // Durasi tampilan notifikasi, contoh 1.5 detik
                });
            });

            // ... kode JavaScript untuk fitur lain ...
        });
    </script>

@endsection
