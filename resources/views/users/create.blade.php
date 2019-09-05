@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1>
            User Accounts
            <small>create new user</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
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
                    {{ Form::open(['url' => route('users.store'), 'method' => 'post', 'id' => 'add-form', 'class' => 'form-horizontal', 'role' => 'form']) }}
                        <div class="box-body">
        
                            <div class="form-group has-feedback @error('name') has-error @enderror">
                                {{ Form::label('name', 'Full Name', ['class' => 'col-sm-2 control-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('name', old('name'), ['class' => 'form-control', 'required' => '', 'placeholder' => 'Full Name']) }}
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    @error('name')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group has-feedback @error('username') has-error @enderror">
                                {{ Form::label('username', 'Username', ['class' => 'col-sm-2 control-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('username', old('username'), ['class' => 'form-control', 'required' => '', 'placeholder' => 'Username']) }}
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    @error('username')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group has-feedback @error('email') has-error @enderror">
                                {{ Form::label('email', 'Email Address', ['class' => 'col-sm-2 control-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('email', old('email'), ['class' => 'form-control', 'required' => '', 'placeholder' => 'Email Addess']) }}
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    @error('email')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group has-feedback @error('password') has-error @enderror">
                                {{ Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::password('password', ['class' => 'form-control', 'required' => '', 'placeholder' => 'Password']) }}
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    @error('password')
                                        <span class="help-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                {{ Form::label('password_confirmation', 'Retype Password', ['class' => 'col-sm-2 control-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => '', 'placeholder' => 'Retype password']) }}
                                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                </div>
                            </div>
                
                        </div>
                        <div class="box-footer">
                            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
                            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                        </div>
                        <!-- /.col -->
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection