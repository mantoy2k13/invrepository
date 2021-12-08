@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="btn-group pull-right tbl-btn-options">
                                <a href="#" class="btn btn-danger waves-effect waves-light btn-sm"><i class="ti-plus"></i> Add Attractions</a>
                            </div>
                            <h4 class="m-t-0 header-title"><b>List of Attractions</b></h4>
                            <p class="text-muted m-b-30 font-13">
                                List of all attractions below.
                            </p>
                            <table id="attractionTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:50px" class="text-center"><i class="ti-image"></i></th>
                                        <th style="width:150px">Name</th>
                                        <th style="width:150px">City</th>
                                        <th style="width:250px">Navigating the Attraction</th>
                                        <th style="width:250px">About the Attraction</th>
                                        <th style="width:250px">Did you know </th>
                                        <th style="width:250px">Drop off & Pick up </th>
                                        <th style="width:50px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

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