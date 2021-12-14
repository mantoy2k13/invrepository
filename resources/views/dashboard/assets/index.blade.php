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
                            <h2 class="m-0 text-dark counter font-600">{{ $get_total_asset_value }}</h2>
                            <div class="text-muted m-t-5">Total Asset Value</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-add-shopping-cart text-pink"></i>
                            <h2 class="m-0 text-dark counter font-600">0</h2>
                            <div class="text-muted m-t-5">Sales</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-store-mall-directory text-info"></i>
                            <h2 class="m-0 text-dark counter font-600">{{ $get_total_assets }}</h2>
                            <div class="text-muted m-t-5">Total Assets</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="pull-right">
                                <div class="btn-group">
                                    <a href="{{ route('asset.create') }}" class="btn btn-inverse waves-effect waves-light btn-sm"><i class="ti-plus"></i> Add Assets</a>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light btn-sm" data-toggle="dropdown" aria-expanded="true"><i class="ti-menu"></i> View Options</button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="javascript:;" onclick="loadAssets('{{ route('asset.view') }}', '');">View All ({{ $get_total_assets }})</a></li>
                                        <li><a href="javascript:;" onclick="loadAssets('{{ route('asset.view') }}', '?post_type=publish');">Published ({{ $get_total_asset_publish }})</a></li>
                                        <li><a href="javascript:;" onclick="loadAssets('{{ route('asset.view') }}', '?post_type=draft');">Drafts ({{ $get_total_asset_draft }})</a></li>
                                        <li><a href="javascript:;" onclick="loadAssets('{{ route('asset.view') }}', '?post_type=delete');">Trash ({{ $get_total_asset_trash }})</a></li>
                                    </ul>
                                    {{-- Delete and View URL --}}
                                    <input type="hidden" id="delete_url" value="{{ route('asset.delete') }}">
                                    <input type="hidden" id="assets_view_url" value="{{ route('asset.view') }}">
                                </div>
                                <div class="btn-group">
                                    <a href="javascript:;" onclick="loadAssets('{{ route('asset.view') }}', '');" class="btn btn-info waves-effect waves-light btn-sm"><i class="ti-reload"></i> Reload</a>
                                </div>
                            </div>
                            <h4 class="m-t-0 header-title"><b>List of Assets</b></h4>
                            <p class="text-muted m-b-30 font-13">
                                List of all assets below.
                            </p>
                            <table id="assetsTable" class="table table-striped table-bordered datatables table-hover">
                                <thead>
                                    <tr>
                                        <th>Asset Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Date</th>
                                        <th class="text-center"><i class="ti-image"></i></th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Data will display here --}}
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

@push('scripts')
<script src="{{ asset('back-office/js/init/init_asset.js') }}"></script>
<script>
    loadAssets("{{ route('asset.view') }}", "");
</script>
@endpush