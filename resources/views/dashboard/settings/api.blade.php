@extends('layouts.dashboard')

@section('title', 'API-Settings')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">API-Settings</h4>
                        <p class="text-muted page-title-alt">Welcome to Cyber Capital Group</p>
                    </div>
                </div>
                <div class="widget-panel widget-style-2 bg-white">
                    <form action="{{ route('user.update-account') }}" data-parsley-validate method="POST" id="updateAccountForm">
                        <h4 class="m-t-0 header-title"><b>Add API Key</b></h4>
                        <p class="text-muted m-b-30 font-13">
                            Fill up all the required fields below.
                        </p>
                        
                         
                        @csrf
                        <div class="row">
                            <div class="col-md-12" id="acc-error-msg"></div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>API Key </label>
                                   <input type="email" class="form-control" id="email" name="email" {{--placeholder="ex. joe@domain.com"   required value="{{ $user->email }}"--}}> 
                                </div>
                            </div>
                            {{-- <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Unique Username" required value="{{ $user->username }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email">Display Name</label>
                                    <select name="display_name" id="display_name" class="form-control">
                                        <option value="1" {{ ($user->display_name==1) ? 'selected' : '' }}>Nickname</option>
                                        <option value="2" {{ ($user->display_name==2) ? 'selected' : '' }}>First Name</option>
                                        <option value="3" {{ ($user->display_name==3) ? 'selected' : '' }}>Last Name</option>
                                        <option value="4" {{ ($user->display_name==4) ? 'selected' : '' }}>First & Last Name</option>
                                        <option value="5" {{ ($user->display_name==5) ? 'selected' : '' }}>Email</option>
                                        <option value="6" {{ ($user->display_name==6) ? 'selected' : '' }}>Username</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" data-parsley-equalto="#confirm_password" data-parsley-minlength="8" class="form-control" id="password" name="password" placeholder="Enter Password" value="">
                                    <small>Password must contain 8 characters or more.</small>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" data-parsley-equalto="#password" data-parsley-minlength="8" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" value="">
                                    <small>Confirm Password must contain 8 characters or more.</small>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-inverse has-spinner" type="button" onclick="updateProfileAccount(this, 'updateAccountForm', 'acc-error-msg')">Confirm</button>
                                </div>
                            </div>
                        </div>
                  
                    </form>
                </div>
            </div>
        </div>

        @include('dashboard._partials.footer')

    </div>

@endsection