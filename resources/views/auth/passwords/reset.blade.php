@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="container">
            <div class="login-box">
                <div class="login-logo">
                    <a href="/"><b>Admin</b>LTE</a>
                </div>
                    <!-- /.login-logo -->
                <div class="login-box-body">
                    <h4 class="login-box-msg">Reset password</h4>

                    <form method="POST" action="{{ route('password.update') }}" role="form">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group has-feedback  @error('email') has-error @enderror">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @error('email')
                                <span class="help-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group has-feedback  @error('password') has-error @enderror">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="New Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @error('password')
                                <span class="help-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group has-feedback">
                            <label for="password_confirmation">Retype Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary tn-block btn-flat">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
