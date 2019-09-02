@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1>
            User Accounts
            <small>create new user</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('users.index') }}" class="active"><i class="fa fa-users"></i> User Accounts</a></li>
            <li><a href="{{ route('users.create') }}" class="active"><i class="fa fa-user"></i> Create New User</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create New User Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('users.store') }}" method="post" role="form" class="form-horizontal">
                        <div class="box-body">
                            @csrf
        
                            <div class="form-group has-feedback @error('name') has-error @enderror">
                                <label for="name" class="col-sm-2 control-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full name">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    @error('name')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group has-feedback @error('username') has-error @enderror">
                                <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    @error('username')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group has-feedback @error('email') has-error @enderror">
                                <label for="email" class="col-sm-2 control-label">Email Address</label>
                                <div class="col-sm-10">
                                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Addess">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    @error('email')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group has-feedback @error('password') has-error @enderror">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    @error('password')
                                        <span class="help-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="password_confirmation" class="col-sm-2 control-label">Retype Password</label>
                                <div class="col-sm-10">
                                    <input id="password_confirmation" type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
                                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                </div>
                            </div>
                
                        </div>
                        <div class="box-footer">
                            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <!-- /.col -->
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection