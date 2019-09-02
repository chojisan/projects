@extends('layouts.auth')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="/"><b>Admin</b>LTE</a>
        </div>
  
        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>
    
            <form action="{{ route('register') }}" method="post" role="form" class="form-horizontal">
                @csrf
                
                <div class="form-group has-feedback @error('name') has-error @enderror">
                    <label for="name" class="col-sm-4 control-label">Full Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full name">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @error('name')
                            <span class="help-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group has-feedback  @error('username') has-error @enderror">
                    <label for="username" class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-8">
                        <input type="username" id="username" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @error('username')
                            <span class="help-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group has-feedback @error('email') has-error @enderror">
                    <label for="email" class="col-sm-4 control-label">Email Address</label>
                    <div class="col-sm-8">
                        <input type="email" id="email" class="form-control @error('email') has-error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @error('email')
                            <span class="help-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group has-feedback @error('password') has-error @enderror">
                    <label for="password" class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">
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
                    <label for="password_confirmation" class="col-sm-4 control-label">Retype Password</label>
                    <div class="col-sm-8">
                        <input id="password_confirmation" type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <!--
                        <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                        </div>
                        -->
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <!--
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                Google+</a>
                -->
            </div>
        
            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
@endsection
