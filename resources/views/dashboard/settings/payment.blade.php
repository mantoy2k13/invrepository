@extends('layouts.dashboard')

@section('title', 'Payment Settings')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Payment Settings</h4>
                        <p class="text-muted page-title-alt">Welcome to Cyber Capital Group</p>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-lg-12"> 
                        <ul class="nav nav-tabs tabs">
                            <li class="tab active">
                                <a href="#profile-update" data-toggle="tab" aria-expanded="true" class="active"> 
                                    <span class="visible-xs"><i class="ti-user"></i></span> 
                                    <span class="hidden-xs">Payment using Credit Card/ Debit Card</span> 
                                </a> 
                            </li> 
                            <li class="tab"> 
                                <a href="#account-update" data-toggle="tab" aria-expanded="false" class=""> 
                                    <span class="visible-xs"><i class="ti-cog"></i></span> 
                                    <span class="hidden-xs">Payment using Paypal</span> 
                                </a> 
                            </li>
                        </ul> 
                        <div class="tab-content"> 
                          <div class="tab-pane active" id="profile-update"> 
                               
                            <div class="container-payment">
                                <h4 class="m-t-0 header-title"><b>Add Credit card/Debit card</b></h4>
                                <p class="text-muted m-b-30 font-13">
                                    Fill up all the required fields below.
                                </p>
                                {{-- <h1 class="head-payment">Confirm Your Payment</h1> --}}
                                <div class="first-row">
                                    <div class="owner">
                                        <h3>Owner</h3>
                                        <div class="input-field">
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="cvv">
                                        <h3>CVV</h3>
                                        <div class="input-field">
                                            <input type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="second-row">
                                    <div class="card-number">
                                        <h3>Card Number</h3>
                                        <div class="input-field">
                                            <input type="number">
                                        </div>
                                    </div>
                                </div>
                                <div class="third-row">
                                    {{-- <h3>Card Number</h3> --}}
                                    <div class="selection-payment">
                                        <div class="date">
                                            <select name="months" id="months">
                                                <option value="Jan">Jan</option>
                                                <option value="Feb">Feb</option>
                                                <option value="Mar">Mar</option>
                                                <option value="Apr">Apr</option>
                                                <option value="May">May</option>
                                                <option value="Jun">Jun</option>
                                                <option value="Jul">Jul</option>
                                                <option value="Aug">Aug</option>
                                                <option value="Sep">Sep</option>
                                                <option value="Oct">Oct</option>
                                                <option value="Nov">Nov</option>
                                                <option value="Dec">Dec</option>
                                              </select>
                                              <select name="years" id="years">
                                                <option value="2020">2024</option>
                                                <option value="2020">2023</option>
                                                <option value="2020">2022</option>
                                                <option value="2020">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                              </select>
                                        </div>
                                        <div class="cards">
                                            <img src="{{ asset('back-office/images/mc.png') }}" alt="">
                                            <img src="{{ asset('back-office/images/vi.png') }}" alt="">
                                            {{-- <img src="{{ asset('back-office/images/pp.png') }}" alt=""> --}}
                                        </div>
                                    </div>    
                                </div>
                                <a class="confirm-payment" href= "javascript:;">Confirm</a>
                            </div>
                            </div> 
                            <div class="tab-pane" id="account-update">
                                {{-- Account Settings --}}
                                <form action="{{ route('user.update-account') }}" data-parsley-validate method="POST" id="updateAccountForm">
                                    <h4 class="m-t-0 header-title"><b>Add Paypal Account</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Fill up all the required fields below.
                                    </p>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12" id="acc-error-msg"></div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Paypal Account</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="ex. joe@domain.com" required value="{{ $user->email }}">
                                            </div>
                                        </div>
                                       {{--   <div class="col-sm-12">
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
                                        </div> --}}
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
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button class="btn btn-inverse has-spinner" type="button" onclick="updateProfileAccount(this, 'updateAccountForm', 'acc-error-msg')">Confirm Account</button>
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