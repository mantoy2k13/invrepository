@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <div class="panel-heading">   
        <a href="{{ route('login') }}">
            <div class="login-logo">
                <img src="{{ asset('back-office/images/comp-logo.png') }}" alt="Martin School Travel" title="Martin School Travel">
            </div>              
        </a>
        <h3 class="text-center"> Reset <strong class="text-custom text-danger">Password</strong> </h3>
    </div>
    <div class="panel-body">
        <form action="" class="form-horizontal m-t-10" method="POST">
            @csrf
            @if (session('status'))
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Oops!</strong> {{ session('status') }}
                        </div>
                    </div>
                </div>
            @endif

            @error('email')
                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Oops!</strong> {{ $message }}
                        </div>
                    </div>
                </div>
            @enderror
            
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control @error('phone_number') is-invalid @enderror" type="text" required="" placeholder="Phone Number" name="phone_number" value="{{ old('phone_number') }}">
                </div>
            </div>

            <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                    <button class="btn btn-danger btn-block text-uppercase waves-effect waves-light" id="usersBtn" type="submit">Send Password Reset Link</button>
                </div>
            </div>

            <div class="form-group m-t-30 m-b-0">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('login') }}" class="text-dark"><i class="fa fa-user m-r-5"></i> Back to Login</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('back-office/js/init/init_users.js') }}"></script>
    <script type="text/javascript">
        $(document).ready( function(){

            $('form').submit( function(e){
                e.preventDefault();

                let form = new FormData(this);
                var url = 'javascript:;';

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        $('#usersBtn').buttonLoader('start');
                    },
                    success: function (res) {
                        if (res.status == 200) {
                            $('#usersBtn').buttonLoader('stop');
                            $.Notification.notify('success','top right','Sent!', res.msg);

                            setTimeout(function () {
                                window.location.href = "{{ route('login') }}";
                            }, 4000);

                        } else if(res.status == 403){
                            $('#btnLogout').trigger('click');
                        } else {
                            $('#usersBtn').buttonLoader('stop');
                            $.Notification.notify('error','top right','Oops!', res.msg);
                        }
                    },
                    error: function(error){
                      console.log(error);
                    },
                });
            });

        });
    </script>
@endpush