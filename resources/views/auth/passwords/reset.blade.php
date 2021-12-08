@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <div class="panel-heading">   
        <a href="{{ route('login') }}">
            <div class="login-logo">
                <img src="{{ asset('back-office/images/comp-logo.png') }}" alt="Cyber Capital Group" title="Cyber Capital Group">
            </div>              
        </a>
        <h3 class="text-center"> Reset <strong class="text-white">Password</strong> </h3>
    </div>
    <div class="panel-body">
        <form action="{{ route('password.update') }}" class="form-horizontal m-t-10" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control @error('email') is-invalid @enderror" type="email" required="" placeholder="Email" name="email" value="{{ $email ?? old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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

            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Confirm Password">
                </div>
            </div>

            <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit">Reset Password</button>
                </div>
            </div>
        </form>
    </div>
@endsection