{{-- PHP Codes --}}
@php
    use App\Http\Controllers\Controller;
    $function = new Controller();
    $my_info = $function->get_my_info();
@endphp

<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="#" class="logo">
                <span>
                    <div class="nav-logo">
                        <img src="{{ asset('back-office/images/comp-logo.png') }}" alt="Cyber Capital Group" title="Cyber Capital Group">
                    </div>
                </span>
            </a>
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left">
                        <i class="ion-navicon"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>
            </div>
            <ul class="nav navbar-nav navbar-right pull-right">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                        <div class="user-img">
                            <img src="{{ ($my_info->user_image) ? url('/').$my_info->user_image : asset('back-office/images/default_image.png') }}" alt="User Image">
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"> <i class="ti-user m-r-5"></i> Profile Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:;"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti-power-off m-r-5"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->
