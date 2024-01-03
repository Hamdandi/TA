@extends('template.master')
@section('title', 'Change Password')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password Lama</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="masukkan password lama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password Baru</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="masukkan password baru">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Konfirmasi Password Baru</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="konfirmasi password baru">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
