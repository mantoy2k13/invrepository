@extends('layouts.dashboard')

@section('title', 'Users')

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
                                    <button type="button"
                                        class="btn btn-default dropdown-toggle waves-effect waves-light btn-sm"
                                        data-toggle="dropdown" aria-expanded="true"><i class="ti-menu"></i> View
                                        Options</button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="javascript:;"
                                                onclick="loadAssets('{{ route('asset.lists') }}', '');">View All
                                                ({{ $get_total_assets }})</a></li>
                                        <li><a href="javascript:;"
                                                onclick="loadAssets('{{ route('asset.lists') }}', '?post_type=publish');">Published
                                                ({{ $get_total_asset_publish }})</a></li>

                                    </ul>
                                    {{-- Delete and View URL --}}
                                    <input type="hidden" id="delete_url" value="{{ route('asset.delete') }}">
                                    <input type="hidden" id="assets_view_url" value="{{ route('asset.lists') }}">
                                </div>
                                <div class="btn-group">
                                    <a href="javascript:;" onclick="loadAssets('{{ route('asset.lists') }}', '');"
                                        class="btn btn-info waves-effect waves-light btn-sm"><i class="ti-reload"></i>
                                        Reload</a>
                                </div>
                            </div>
                            <h4 class="m-t-0 header-title"><b>List of Users</b></h4>
                            <p class="text-muted m-b-30 font-13">
                                List of all users below.
                            </p>
                            <table id="viewUserTable" class="table table-striped table-bordered datatables table-hover">
                                <thead>
                                    <tr>
                                        <th>UserName</th>
                                        <th>Email</th>
                                        <th>Date Created</th>
                                        <th>User Type</th>
                                        <th>Image</th>
                                        <th>Action</th>
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
    <script src="{{ asset('back-office/js/init/init_all_users.js') }}"></script>
    <script>
        loadViewUser("{{ route('users.view') }}", "");
    </script>
@endpush
