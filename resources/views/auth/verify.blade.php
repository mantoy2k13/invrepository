@extends('layouts.auth')

@section('title', 'Verify Email')

@section('content')
    <div class="row">
        <div class="col-md-6 auth-left-img">
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
                <h3 class="text-center"> Verify Your <strong class="text-white">Email Address</strong> </h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('verification.resend') }}" class="form-horizontal m-t-10" method="POST">
                    @csrf
                    @if (session('resent'))
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Email Sent!</strong> A fresh verification link has been sent to your email address.
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <p>
                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},
                            </p>
                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit">Confirm Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection