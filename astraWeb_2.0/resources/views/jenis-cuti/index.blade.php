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
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>JENIS CUTI</th>
                        <th>JATAH CUTI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenis_cutis as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->jenis_cuti }}</td>
                            <td>{{ $item->jatah_cuti }}</td>
                            <td class="row">
                                <a href="jenis-cuti/edit/{{ $item->id }}" class="btn btn-primary">Edit</a>
                                <form id="delete-form-{{ $item->id }}" action="jenis-cuti/delete/{{ $item->id }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="button" data-id="{{ $item->id }}"
                                        data-toggle="modal" data-target="#deleteConfirmationModal">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#deleteConfirmationModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var itemId = button.data('id'); // Extract the item ID from the data-id attribute

                var modal = $(this);
                modal.find('#deleteButton').click(function() {
                    document.getElementById('delete-form-' + itemId).submit();
                });
            });
        });

        $(document).ready(function() {
            setTimeout(function() {
                $(".alert-success").fadeOut('slow');
            }, 3000); // Waktu dalam milidetik, 3000 milidetik = 3 detik
        });
    </script>
@endsection
