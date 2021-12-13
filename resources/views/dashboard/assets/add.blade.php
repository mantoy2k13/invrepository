@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Assets</h4>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ route('assets') }}">All Assets</a>
                            </li>
                            <li class="active">
                                Add New Asset
                            </li>
                        </ol>
                    </div>
                </div>
                <form action="javascript:;" data-parsley-validate>
                    <div class="row">
                        <div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Create a new asset</b></h4>
                                <p class="text-muted m-b-30 font-13">
                                    Fill up all the required fields below.
                                </p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="asset_name">Asset Name</label>
                                            <input type="text" class="form-control" id="asset_name" name="asset_name" placeholder="Asset Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="asset_description">Asset Description</label>
                                            <div class="summernote" id="asset_description" name="asset_description"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="asset_price">Asset Price</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                                <input type="number" min="0" id="asset_price" name="asset_price" class="form-control" placeholder="0.00">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="asset_quantity">Asset Quantity</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
                                                <input type="number" min="0" id="asset_quantity" name="asset_quantity" class="form-control" placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Asset Image and Video</b></h4>
                                <p class="text-muted m-b-30 font-13">
                                    Fill up all the required fields below.
                                </p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="asset-image-upload">
                                                <div class="upload-files-wrapper">
                                                    <i class="ti-export"></i>
                                                    <p class="text-black">Drag and Drop Images here or <br>Click to Upload</p>
                                                    <input type="file" accept=".gif, .png, .jpg, .jpeg" onchange="previewImage(this, '.asset-image-upload')">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="video_banner">Featured Video Banner</label>
                                            <input type="text" class="form-control" id="video_banner" name="video_banner" placeholder="https://www.youtube.com/embed/video-youtube-id" required>
                                            <small>Copy the video embed URL. The URL format should be "https://www.youtube.com/embed/video-youtube-id".</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @include('dashboard._partials.footer')

    </div>
    
@endsection