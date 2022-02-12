@extends('layouts.dashboard')

@section('title', 'Investments')

@section('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{ asset('back-office/plugins/credit-card/card-js.min.css') }}">
    <script type="text/javascript" src="{{ asset('back-office/plugins/credit-card/card-js.min.js') }}"></script>
@endsection

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                {{-- Headers --}}
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">My Investments</h4>
                        <p class="text-muted page-title-alt">This is where your investments will displayed and recorded</p>
                    </div>
                </div>
                {{-- Counts --}}
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-attach-money text-primary"></i>
                            <h2 class="m-0 text-dark counter font-600">0.00</h2>
                            <div class="text-muted m-t-5">Today's Invest</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-attach-money text-pink"></i>
                            <h2 class="m-0 text-dark counter font-600">0.00</h2>
                            <div class="text-muted m-t-5">Total Invested</div>
                        </div>
                    </div>
                </div>
                {{-- My Investments Table --}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="pull-right">
                                <div class="btn-group">
                                    <a href="javascript:;" onclick="addCash()" class="btn btn-inverse waves-effect waves-light btn-sm"><i class="ti-plus"></i> Add Cash</a>
                                </div>
                                <div class="btn-group">
                                    <input type="hidden" id="investments_view_url" value="">
                                </div>
                                <div class="btn-group">
                                    <a href="javascript:;" onclick="" class="btn btn-info waves-effect waves-light btn-sm"><i class="ti-reload"></i> Reload</a>
                                </div>
                            </div>
                            <h4 class="m-t-0 header-title"><b>Investment History</b></h4>
                            <p class="text-muted m-b-30 font-13">
                                List of all your investments.
                            </p>
                            <table id="investmentsTable" class="table table-striped table-bordered datatables table-hover">
                                <thead>
                                    <tr>
                                        <th>Investment ID</th>
                                        <th>Deposit Amount</th>
                                        <th>Date</th>
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

        {{-- Add Cash Modal --}}
        <div class="modal fade" id="addCashModasdl" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="m-t-0 header-title"><b><i class="ti-plus"></i> Investment History</b></h4>
                    </div>
                    <form action="javascript:;" method="POST">
                        <div class="modal-body">
                            <form class="form-horizontal" id="example-form">
                                <div class="form-group">
                                    <label for="">Enter Amount</label>
                                    <div class="input-group m-t-10">
                                        <span class="input-group-addon btn-inverse"><i class="fa fa-dollar"></i></span>
                                        <input oninput="validateNumber(this);" type="text" id="amount" name="amount" class="form-control" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="card-js form-group">
                                    <!-- Card number -->
                                    <input class="card-number form-control" name="field__card-number" placeholder="Enter your card number" autocomplete="off" required>
                                    <!-- Name on card -->
                                    <input class="name form-control" id="the-card-name-id" name="field__card-name" placeholder="Enter the name on your card" autocomplete="off" required>
                                    <!-- Card expiry (element that is displayed) -->
                                    <input class="expiry form-control" autocomplete="off" required>
                                    <!-- Card expiry - Month (hidden) -->
                                    <input class="expiry-month" name="field__card-expiry-month">
                                    <!-- Card expiry - Year (hidden) -->
                                    <input class="expiry-year" name="field__card-expiry-year">
                                    <!-- Card CVC -->
                                    <input class="cvc form-control" name="field__card-cvc" autocomplete="off" required>
                                </div><!-- END .card-js wrapper -->
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-inverse waves-effect waves-light btn-sm"><i class="ti-check"></i> Add Cash</a>
                            <a href="javascript:;" class="btn btn-danger waves-effect waves-light btn-sm"><i class="ti-close"></i> Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- sample modal content -->
        <div id="addCashModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><i class="ti-plus"></i> Add New Investment</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" id="example-form">
                                    <div class="form-group">
                                        <label for="">Enter Amount</label>
                                        <div class="input-group m-t-10">
                                            <span class="input-group-addon btn-inverse"><i class="fa fa-dollar"></i></span>
                                            <input oninput="validateNumber(this);" type="text" id="amount" name="amount" class="form-control" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="card-js form-group">
                                        <!-- Card number -->
                                        <input class="card-number form-control" name="field__card-number" placeholder="Enter your card number" autocomplete="off" required>
                                        <!-- Name on card -->
                                        <input class="name form-control" id="the-card-name-id" name="field__card-name" placeholder="Enter the name on your card" autocomplete="off" required>
                                        <!-- Card expiry (element that is displayed) -->
                                        <input class="expiry form-control" autocomplete="off" required>
                                        <!-- Card expiry - Month (hidden) -->
                                        <input class="expiry-month" name="field__card-expiry-month">
                                        <!-- Card expiry - Year (hidden) -->
                                        <input class="expiry-year" name="field__card-expiry-year">
                                        <!-- Card CVC -->
                                        <input class="cvc form-control" name="field__card-cvc" autocomplete="off" required>
                                    </div><!-- END .card-js wrapper -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-inverse waves-effect waves-light"><i class="ti-check"></i> Submit Payment</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        @include('dashboard._partials.footer')
    </div>
    
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('back-office/plugins/credit-card/card-js.jquery.js') }}"></script>
    <script>
       
      </script>
    <script src="{{ asset('back-office/js/init/init_investment.js') }}"></script>
@endpush