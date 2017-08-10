@extends('layouts.app_auth')

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="authentication-header m-b-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <a class="authentication-logo" href="/">
                            <img src="img/logo.png" alt="" height="25">
                            <span>{{ config('app.name') }}</span>
                        </a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('register') }}" class="btn btn-outline-info">Sign up</a>
                    </div>
                </div>
            </div>
            <div class="authentication-content m-b-30">
                <h3 class="m-t-0 m-b-30 text-center">Login</h3>
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="form-control-1">Email address</label>
                        <input type="email" class="form-control" id="form-control-1" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="form-control-2">Password</label>
                        <input type="password" class="form-control" id="form-control-2" placeholder="Password" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-control-info custom-checkbox active">
                            <input class="custom-control-input" type="checkbox" name="mode" {{ old('remember') ? 'checked' : '' }} name="remember">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-label">Keep me signed in</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="text-info pull-right">Forgot password?</a>&nbsp;
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-info btn-block">Submit</button>&nbsp;
                        </div>
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-googleplus btn-block" onclick="window.location.href = '{{ route('auth.google') }}';">
                                <i class="zmdi zmdi-google-plus"></i> Login with Google
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
