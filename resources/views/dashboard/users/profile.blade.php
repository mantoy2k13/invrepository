@extends('layouts.dashboard')

@section('title', 'My Profile | Assets')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">My Profile</h4>
                        <ol class="breadcrumb">
                            <li>
                                <a href="javascript:;">Profile Settings</a>
                            </li>
                            <li class="active">
                                My Profile
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
                        {{-- Edit Profile --}}
                        <form action="" data-parsley-validate method="POST" id="updateProfileForm">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Edit Profile</b></h4>
                                <p class="text-muted m-b-30 font-13">
                                    Fill up all the required fields below.
                                </p>
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required value="{{ $user->first_name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required value="{{ $user->last_name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="middle_name">Middle Name</label>
                                            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" value="{{ $user->middle_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nickname">Nickname</label>
                                            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname" value="{{ $user->nickname }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_number">Contact Number</label>
                                            <input type="text" class="form-control" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" id="contact_number" name="contact_number" placeholder="Contact Number" value="{{ $user->contact_number }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{ $user->address }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="bio">About Yourself</label>
                                            <textarea name="bio" id="bio" cols="10" rows="5" class="form-control" placeholder="Tell us about yourself...">{!! $user->bio !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-inverse has-spinner" type="submit" onclick="updateProfile(this, 'updateProfileForm')">Update Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- Account Settings --}}
                        <form action="" data-parsley-validate method="POST" id="updateAccountForm">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Edit Account Settings</b></h4>
                                <p class="text-muted m-b-30 font-13">
                                    Fill up all the required fields below.
                                </p>
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="ex. joe@domain.com" required value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Unique Username" required value="{{ $user->username }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="email">Display Name</label>
                                            <select name="display_name" id="display_name" class="form-control">
                                                <option value="1">Nickname</option>
                                                <option value="2">First Name</option>
                                                <option value="3">Last Name</option>
                                                <option value="4">First & Last Name</option>
                                                <option value="5">Email</option>
                                                <option value="6">Username</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" data-parsley-equalto="#confirm_password" class="form-control" id="password" name="password" placeholder="Enter Password" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input type="password" data-parsley-equalto="#password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-inverse has-spinner" type="submit" onclick="updateAccount(this, 'updateProfileForm')">Update Account</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <form action="" data-parsley-validate method="POST" id="updateProfileImageForm">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Profile Picture</b></h4>
                                <p class="text-muted m-b-30 font-13">
                                    Drag or click the image below to upload new image
                                </p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="asset-image-upload">
                                                <div class="uploaded-files-wrapper img-responsive">
                                                    <img src="{{ ($user->user_image) ? url('/').$user->user_image : asset('back-office/images/default_image.png') }}" alt="{{ $user->first_name }}" >
                                                    <div class="uploaded-files-body"><i class="ti-export"></i> 
                                                        <p class="text-black">Click to Change Image</p>
                                                    </div>
                                                    <input id="uploadFiles" type="file" accept=".gif, .png, .jpg, .jpeg" onchange="previewImage(this, '.asset-image-upload', 'asset_image')">
                                                </div>
                                            </div>
                                            <input type="hidden" name="oldImgLink" value="{{ $user->user_image }}">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-inverse d-block full-width has-spinner" type="button" onclick="updateProfileImage(this, 'updateProfileImageForm')">Update Profile Picture</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard._partials.footer')

    </div>
    
@endsection

@push('scripts')
<script src="{{ asset('back-office/js/init/init_asset.js') }}"></script>
@endpush