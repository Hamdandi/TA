@extends('template.master')
@section('title', 'Lowongan')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Manajemen Lowongan</h3>
            <a href="{{ url('lowongan/create') }}" class="btn btn-primary">Add New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA LOWONGAN</th>
                        <th>JENIS PEKERJAAN</th>
                        <th>DESKRIPSI PEKERJAAN</th>
                        <th>ACTION</th>
                </thead>
                <tbody>
                    @foreach ($lowongans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_lowongan }}</td>
                            <td>{{ $item->jenis_pekerjaan }}</td>
                            <td>{{ $item->short }}</td>
                            <td class="row ">
                                <a href="lowongan/edit/{{ $item->id }}" class="btn btn-primary">Edit</a>
                                <form action="lowongan/delete/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger delete-button" type="button" data-toggle="modal"
                                        data-target="#confirmationModal" data-id="{{ $item->id }}">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Confirmation Modal -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
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
        $(document).ready(function() {
            var deleteForm;

            // Trigger the modal and store the form
            $('.delete-button').on('click', function() {
                deleteForm = $(this).closest('form');
            });

            // Handle the confirmation
            $('#confirmDelete').on('click', function() {
                deleteForm.submit();

                // Menampilkan notifikasi SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Lowongan berhasil dihapus.',
                    showConfirmButton: false,
                    timer: 1500 // Durasi tampilan notifikasi, contoh 1.5 detik
                });
            });
        });
    </script>
@endsection
