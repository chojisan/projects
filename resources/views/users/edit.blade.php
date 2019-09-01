@extends('layouts.admin')

@section('content-header')
<section class="content-header">
        <h1>
            User Accounts
          <small>update user</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="/users" class="active">User Accounts</a></li>
          <li><a href="/users" class="active">Update User</a></li>
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
              <!-- form start -->
        <form action="/users/{{ $user->id }}" method="post" role="form">
                <div class="box-body">
        @csrf
        <div class="form-group has-feedback">
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="Full name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="form-group has-feedback">
          <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="form-group has-feedback">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
        </div>
        <div class="form-group has-feedback">
          <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
                </div>
                <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
          <!-- /.col -->
    
      </form>
            </div>
        </div>
    </div>
</section>
@endsection