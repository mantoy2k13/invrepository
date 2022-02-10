@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Dashboard</h4>
                        <p class="text-muted page-title-alt">Welcome to Cyber Capital Group</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-attach-money text-primary"></i>
                            <h2 class="m-0 text-dark counter font-600">{{ $get_total_assets }}</h2>
                            <div class="text-muted m-t-5">Total Assets</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-add-shopping-cart text-pink"></i>
                            <h2 class="m-0 text-dark counter font-600">1256</h2>
                            <div class="text-muted m-t-5">Sales</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-store-mall-directory text-info"></i>
                            <h2 class="m-0 text-dark counter font-600">18</h2>
                            <div class="text-muted m-t-5">Stores</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-account-child text-custom"></i>
                            <h2 class="m-0 text-dark counter font-600">{{ $get_total_users }}</h2>
                            <div class="text-muted m-t-5">Users</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard._partials.footer')

    </div>

@endsection
