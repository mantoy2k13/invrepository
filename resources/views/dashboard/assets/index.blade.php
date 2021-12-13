@extends('layouts.dashboard')

@section('title', 'Assets')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Assets</h4>
                        <p class="text-muted page-title-alt">Welcome to the Assets Page</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-attach-money text-primary"></i>
                            <h2 class="m-0 text-dark counter font-600">50568</h2>
                            <div class="text-muted m-t-5">Total Asset Value</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-add-shopping-cart text-pink"></i>
                            <h2 class="m-0 text-dark counter font-600">1256</h2>
                            <div class="text-muted m-t-5">Sales</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-store-mall-directory text-info"></i>
                            <h2 class="m-0 text-dark counter font-600">18</h2>
                            <div class="text-muted m-t-5">Total Asset Number</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="btn-group pull-right tbl-btn-options">
                                <a href="{{ route('asset.create') }}" class="btn btn-inverse waves-effect waves-light btn-sm"><i class="ti-plus"></i> Add Assets</a>
                            </div>
                            <h4 class="m-t-0 header-title"><b>List of Assets</b></h4>
                            <p class="text-muted m-b-30 font-13">
                                List of all assets below.
                            </p>
                            <table id="assetsTable" class="table table-striped table-bordered datatables">
                                <thead>
                                    <tr>
                                        <th class="text-center"><i class="ti-image"></i></th>
                                        <th>Asset Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="tbl-img">
                                                <a href="{{ asset('back-office/images/default_image.png'); }}" class="image-link image-popup">
                                                    <img class="img_render" src="{{ asset('back-office/images/default_image.png'); }}" alt="Attarction Image">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:;">Bitcoin</a>
                                            </div>
                                        </td>
                                        <td>Bitcoin is a crypto coin</td>
                                        <td>5</td>
                                        <td>$ 25,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard._partials.footer')

    </div>

@endsection