@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="panel-heading">   
        <a href="{{ route('login') }}">
            <div class="login-logo">
                <img src="{{ asset('back-office/images/comp-logo.png') }}" alt="Martin School Travel" title="Martin School Travel">
            </div>              
        </a>
        <h3 class="text-center"> Register to <strong class="text-custom text-danger">Martin School Travel</strong> </h3>
    </div>
    <div class="panel-body">
        <form action="{{ route('register') }}" class="form-horizontal m-t-10" method="POST">
            @csrf
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" type="text" required="" placeholder="Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email"  name="email" required="" placeholder="Email Address">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="Password" autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Confirm Password" autocomplete="new-password">
                </div>
            </div>
            
            <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                    <button class="btn btn-danger btn-block text-uppercase waves-effect waves-light" type="submit">Register</button>
                </div>
            </div>
            <div class="form-group m-t-30 m-b-0">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('login') }}" class="text-dark"><i class="fa fa-user m-r-5"></i> Having an account? Login here.</a>
                </div>
            </div>
        </form>
    </div>
@endsection