@extends('layouts.app_auth')

@section('content')

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="authentication-header m-b-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <a class="authentication-logo" href="index.html">
                            <img src="img/logo.png" alt="" height="25">
                            <span>cosmos</span>
                        </a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('login') }}" class="btn btn-outline-info">Login</a>
                    </div>
                </div>
            </div>
            <div class="authentication-content m-b-30">
                <h3 class="m-b-30">Create Your {{ config('app.name') }} Account</h3>
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="email-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <div class="clearfix">
                        <div class="pull-left">
                            By clicking "Submit" you agree to {{ config('app.name') }}’s
                            <br><a href="#" class="text-info">Terms of Service</a> and <a href="#" class="text-info">Privacy
                                Policy</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-info btn-labeled">Submit
                                <span class="btn-label btn-label-right">
                      <i class="zmdi zmdi-chevron-right p-x-5"></i>
                    </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extra_scripts')

    <script>

        $(function () {
            $("#email").keyup(function () {
                $("#email-group").attr('form-group');
            });
            $("#password").keyup(function () {
                $("#errorblock").html("");
            });
        });
    </script>

@endsection
