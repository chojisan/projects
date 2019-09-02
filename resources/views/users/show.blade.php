@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1>
            User Accounts
            <small>user profile</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/users" class="active">User Accounts</a></li>
            li><a href="/users" class="active">User Profile</a></li>
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
                        <h3 class="box-title">Update User Form</h3>
                    </div>
                     <!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <div class="form-control">
                                {{ $user->name }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="form-control">
                                {{ $user->username }}
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="form-control">
                                {{ $user->email }}
                            </div>
                        </div>
                        <div class="box-footer">
                                <a href="/users" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection