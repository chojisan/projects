@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1>
            User Accounts
            <small>user profile</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{ route('users.index') }}" class="active"><i class="fa fa-users"></i> User Accounts</a></li>
            <li><a href="{{ route('users.show', $user->id) }}" class="active"><i class="fa fa-eye"></i> User Profile</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">User Details</h3>
                    </div>
                     <!-- /.box-header -->

                    <div class="box-body form-horizontal">
                        <div class="form-group has-feedback">
                            <label for="name" class="col-sm-2 control-label">Full Name</label>
                            <div class="col-sm-10">
                                <div class="form-control">
                                    {{ $user->name }}
                                </div>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="username" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <div class="form-control">
                                    {{ $user->username }}
                                </div>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>
    
                        <div class="form-group has-feedback">
                            <label for="email" class="col-sm-2 control-label">Email Address</label>
                            <div class="col-sm-10">
                                <div class="form-control">
                                    {{ $user->email }}
                                </div>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="box-footer">
                                <a href="{{ route('users.index') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection