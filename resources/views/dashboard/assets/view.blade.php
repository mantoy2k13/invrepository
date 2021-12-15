@extends('layouts.dashboard')

@section('title',  $asset->asset_name.' | Assets')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="video-banner" style="background: linear-gradient(to right,#00000070, #00000070), url({{ ($asset->asset_img) ? $asset->asset_img : asset('back-office/images/default_image.png') }}) no-repeat top center">
                <div class="video-content" id="video-content"></div>
                <div class="banner-text" id="video-banner-text">
                <h3>{{ $asset->asset_name }}</h3>
                <div class="video-owner-info"><span class="owner-name">Date Added: {{ date('Y/m/d, h:i A', strtotime($asset->created_at)) }} | Date Updated: {{ date('Y-m-d h:i A', strtotime($asset->updated_at)) }}</span></div>
                <button class="banner-watch-button" type="button" onclick="watchVideo('{{ $asset->asset_video }}')">Watch Video</button>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="widget-panel widget-style-2 bg-white m-t-20">
                            <i class="md md-attach-money text-primary"></i>
                            <h2 class="m-0 text-dark counter font-600">{{ '$'.number_format($asset->asset_price, 2, '.', ''); }}</h2>
                            <div class="text-muted m-t-5">Asset Price</div>
                        </div>
                        <div class="card-box m-t-20">
                            <h4 class="m-t-0 header-title"><b>Asset's Information</b></h4>
                            <div class="p-20">
                                <div class="about-info-p">
                                    <strong>Asset Name</strong>
                                    <br>
                                    <p class="text-muted">{{ $asset->asset_name }}</p>
                                </div>
                                <div class="about-info-p">
                                    <strong>Price</strong>
                                    <br>
                                    <p class="text-muted">{{ '$'.number_format($asset->asset_price, 2, '.', ''); }}</p>
                                </div>
                                <div class="about-info-p">
                                    <strong>Quantity</strong>
                                    <br>
                                    <p class="text-muted">{{ $asset->asset_quantity }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Personal-Information -->
                        <div class="card-box">
                            <h4 class="m-t-0 header-title"><b>Description</b></h4>
                            
                            <div class="p-20">
                                {!! $asset->asset_description !!}
                            </div>
                        </div>
                        <!-- Personal-Information -->
                    </div>
                    <div class="col-md-8">
                        <div class="card-box m-t-20">
                            <h4 class="m-t-0 header-title"><b>Latest Activity</b></h4>
                            {{-- <div class="p-20">
                                <div class="timeline-2">
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="text-muted">{{ date('Y-m-d') }}</div>
                                            <p>No latest activity</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="alert alert-info">
                                No latest activity
                            </div>
                        </div>
                        <div class="card-box m-t-20">
                            <h4 class="m-t-0 header-title"><b>All Activity</b></h4>
                            <table id="assetsTable" class="table table-striped table-bordered datatables table-hover">
                                <thead>
                                    <tr>
                                        <th>Activity Log</th>
                                        <th>Description</th>
                                        <th>Time</th>
                                        <th>Date</th>
                                        <th class="text-center"><i class="ti-image"></i></th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
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