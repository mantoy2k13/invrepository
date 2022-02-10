@extends('layouts.dashboard')

@section('title', 'Update User | User')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Update User</h4>
                        <ol class="breadcrumb">
                            <li>
                                <a href="javascript:;">Edit User </a>
                            </li>
                            <li class="active">
                                Update User
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs tabs">
                            <li class="tab active">
                                <a href="#profile-update" data-toggle="tab" aria-expanded="true" class="active">
                                    <span class="visible-xs"><i class="ti-user"></i></span>
                                    <span class="hidden-xs">Profile Settings</span>
                                </a>
                            </li>
                            <li class="tab">
                                <a href="#account-update" data-toggle="tab" aria-expanded="false" class="">
                                    <span class="visible-xs"><i class="ti-cog"></i></span>
                                    <span class="hidden-xs">Account Settings</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile-update">
                                {{-- Edit Profile --}}
                                <form action="{{ route('update.user') }}" data-parsley-validate method="POST"
                                    id="updateProfileForm">
                                    <h4 class="m-t-0 header-title"><b>Edit Profile</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Fill up all the required fields below.
                                    </p>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="first_name">Profile Picture</label>
                                                <div class="profile-image-upload">
                                                    <div class="uploaded-files-wrapper img-responsive">
                                                        <img src="{{ $user->user_image ? url('/') . $user->user_image : asset('back-office/images/default_image.png') }}"
                                                            alt="{{ $user->first_name }}">
                                                        <div class="uploaded-files-body"><i class="ti-export"></i>
                                                            <p class="text-black">Click to Change Profile Picture</p>
                                                        </div>
                                                        <input id="uploadFiles" type="file" accept=".gif, .png, .jpg, .jpeg"
                                                            onchange="previewImage(this, '.profile-image-upload', 'profile_image')">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="oldImgLink" value="{{ $user->user_image }}">
                                            </div>
                                            <p class="text-muted m-b-30 font-13">
                                                Drag or click the image below to upload new profile picture
                                            </p>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name</label>
                                                        <input type="text" class="form-control" id="first_name"
                                                            name="first_name" placeholder="First Name" required
                                                            value="{{ $user->first_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        <input type="text" class="form-control" id="last_name"
                                                            name="last_name" placeholder="Last Name" required
                                                            value="{{ $user->last_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="middle_name">Middle Name</label>
                                                        <input type="text" class="form-control" id="middle_name"
                                                            name="middle_name" placeholder="Middle Name"
                                                            value="{{ $user->middle_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="nickname">Nickname</label>
                                                        <input type="text" class="form-control" id="nickname"
                                                            name="nickname" placeholder="Nickname"
                                                            value="{{ $user->nickname }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="contact_number">Contact Number</label>
                                                        <input type="text" class="form-control"
                                                            data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" id="contact_number"
                                                            name="contact_number" placeholder="Contact Number"
                                                            value="{{ $user->contact_number }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    placeholder="Enter Address" value="{{ $user->address }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="bio">About Yourself</label>
                                                <textarea name="bio" id="bio" cols="10" rows="5" class="form-control"
                                                    placeholder="Tell us about yourself...">{!! $user->bio !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button class="btn btn-inverse has-spinner" type="button"
                                                    onclick="updateProfileAccount(this, 'updateProfileForm', 'prof-err-msg')">Update
                                                    Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="account-update">
                                {{-- Account Settings --}}
                                <form action="{{ route('user.update-account') }}" data-parsley-validate method="POST"
                                    id="updateAccountForm">
                                    <h4 class="m-t-0 header-title"><b>Edit Account Settings</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Fill up all the required fields below.
                                    </p>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12" id="acc-error-msg"></div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="ex. joe@domain.com" required value="{{ $user->email }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username" name="username"
                                                    placeholder="Unique Username" required value="{{ $user->username }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Display Name</label>
                                                <select name="display_name" id="display_name" class="form-control">
                                                    <option value="1" {{ $user->display_name == 1 ? 'selected' : '' }}>
                                                        Nickname</option>
                                                    <option value="2" {{ $user->display_name == 2 ? 'selected' : '' }}>
                                                        First Name</option>
                                                    <option value="3" {{ $user->display_name == 3 ? 'selected' : '' }}>
                                                        Last Name</option>
                                                    <option value="4" {{ $user->display_name == 4 ? 'selected' : '' }}>
                                                        First & Last Name</option>
                                                    <option value="5" {{ $user->display_name == 5 ? 'selected' : '' }}>
                                                        Email</option>
                                                    <option value="6" {{ $user->display_name == 6 ? 'selected' : '' }}>
                                                        Username</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" data-parsley-equalto="#confirm_password"
                                                    data-parsley-minlength="8" class="form-control" id="password"
                                                    name="password" placeholder="Enter Password" value="">
                                                <small>Password must contain 8 characters or more.</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="confirm_password">Confirm Password</label>
                                                <input type="password" data-parsley-equalto="#password"
                                                    data-parsley-minlength="8" class="form-control" id="confirm_password"
                                                    name="confirm_password" placeholder="Confirm Password" value="">
                                                <small>Confirm Password must contain 8 characters or more.</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button class="btn btn-inverse has-spinner" type="button"
                                                    onclick="updateProfileAccount(this, 'updateAccountForm', 'acc-error-msg')">Update
                                                    Account</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard._partials.footer')

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('back-office/js/init/init_users.js') }}"></script>
@endpush
