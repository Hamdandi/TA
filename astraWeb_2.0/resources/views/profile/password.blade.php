@extends('template.master')
@section('title', 'Change Password')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-pane" id="changepassword">
                    <form action="{{ route('profile.change-password') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="new_password_confirmation">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
