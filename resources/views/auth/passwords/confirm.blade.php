@extends('layouts.auth')

@section('title', 'Confirm Password')

@section('content')
    <div class="panel-heading">   
        <a href="{{ route('login') }}">
            <div class="login-logo">
                <img src="{{ asset('back-office/images/comp-logo.png') }}" alt="Martin School Travel" title="Martin School Travel">
            </div>              
        </a>
        <h3 class="text-center"> Confirm <strong class="text-custom text-danger">Password</strong> </h3>
    </div>
    <div class="panel-body">
        <form action="{{ route('password.confirm') }}" class="form-horizontal m-t-10" method="POST">
            @csrf
            @error('password')
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
                    <label for="password">Please confirm your password before continuing</label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="Password" autocomplete="current-password">
                </div>
            </div>

            <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                    <button class="btn btn-danger btn-block text-uppercase waves-effect waves-light" type="submit">Confirm Password</button>
                </div>
            </div>

            @if (Route::has('password.request'))
                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12 text-center">
                        <a href="{{ route('password.request') }}" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                </div>
            @endif
        </form>
    </div>
@endsection