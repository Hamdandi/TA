@extends('template.master')
@section('title', 'Create Punishment')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('punishment.store') }}">
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control" placeholder="To:">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Subject:">
                </div>
                <div class="form-group">
                    <textarea id="summernote" class="form-control" style="height: 300px">

                    </textarea>
                </div>
                <div class="form-group">
                    <div class="btn btn-default btn-file">
                        <i class="fas fa-paperclip"></i> Attachment
                        <input type="file" name="attachment">
                    </div>
                    <p class="help-block">Max. 32MB</p>
                </div>
            </div>
        </form>
    </div>
@endsection
