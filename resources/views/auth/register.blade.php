@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="row">
        <div class="col-md-6 auth-left-img" style="height: 80%;">
            <div class="auth-img img-responsive">
                <img src="{{ asset('back-office/images/auth-img.png') }}" alt="Login Image">
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel-heading">   
                <a href="{{ route('login') }}">
                    <div class="login-logo">
                        <img src="{{ asset('back-office/images/comp-logo.png') }}" alt="Cyber Capital Group" title="Cyber Capital Group">
                    </div>              
                </a>
                <h3 class="text-center"> Register to <strong class="text-white">Cyber Capital Group</strong> </h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('register') }}" class="form-horizontal m-t-10" method="POST">
                    @csrf
                    <div class=" col-xs-12">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" type="text" required="" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" type="text" required="" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" type="text" required="" placeholder="Username">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email"  name="email" required="" placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="Password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Confirm Password" autocomplete="new-password">
                        </div>
                        <div class="text-center form-group">
                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>
                    <div class="m-t-30 m-b-0 col-sm-12">
                        <div class="form-group text-center">
                            <i class="fa fa-user m-r-5"></i> Having an account? <a href="{{ route('login') }}">Login here.</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection