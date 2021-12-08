@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="panel-heading">
        <a href="{{ route('login') }}">
            <div class="login-logo">
                <img src="{{ asset('back-office/images/comp-logo.png') }}" alt="Cyber Capital Group" title="Cyber Capital Group">
            </div>
        </a>
        <h3 class="text-center"> Sign In to <strong class="text-white">Cyber Capital Group</strong> </h3>
    </div>
    <div class="panel-body">
        <form action="{{ route('login') }}" class="form-horizontal m-t-10" method="POST">
            @csrf
            @error('email')
                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Oops!</strong> {{ $message }}
                        </div>
                    </div>
                </div>
            @enderror

            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control @error('email') is-invalid @enderror" type="email" required="" placeholder="Email" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group ">
                <div class="col-xs-12">
                    <div class="checkbox checkbox-primary">
                        <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Remember me
                        </label>
                    </div>

                </div>
            </div>

            <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                </div>
            </div>
            @if (Route::has('password.request'))
                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12 text-center">
                        <a href="{{ route('password.request') }}"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                </div>
            @endif
            <div class="form-group m-t-30 m-b-0">
                <div class="col-sm-12 text-center">
                    <i class="fa fa-user m-r-5"></i> Don't have account? <a href="{{ route('register') }}">Register here.</a>
                </div>
            </div>
        </form>
    </div>
@endsection
