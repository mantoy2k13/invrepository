@extends('layouts.dashboard')

@section('title', 'Investments')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Investments</h4>
                        <p class="text-muted page-title-alt">Welcome to Cyber Capital Group</p>
                      
                        </div>
                </div>
                {{-- <div class="spacer"></div> --}}
                <div class="widget-panel widget-style-2 bg-white">
                    <form action="{{ route('investment.store') }}" data-parsley-validate method="POST" id="investmentForm">
                        <h4 class="m-t-0 header-title"><b>Enter an Amount</b></h4>
                       
                        
                         
                        @csrf
                        <div class="row">
                            <div class="col-md-12" id="acc-error-msg"></div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="invest_amount">Enter Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"></i></span>
                                        <input type="number" min="0" id="invest_amount" name="invest_amount" class="form-control" placeholder="0.00" required>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-inverse has-spinner" type="button" onclick="submitInvestment(this, 'investmentForm')"> Confirm</button>
                                </div>
                            </div>
                        </div>
                  
                    </form>
                </div>
            </div>
        </div>

        @include('dashboard._partials.footer')

    </div>
    
@endsection

@push('scripts')
<script src="{{ asset('back-office/js/init/init_investment.js') }}"></script>
@endpush