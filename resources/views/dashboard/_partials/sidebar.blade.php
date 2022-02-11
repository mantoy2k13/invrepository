{{-- PHP Codes --}}
@php
use App\Http\Controllers\Controller;
$function = new Controller();
$my_info = $function->get_my_info();
$display_name = $function->display_name($my_info->display_name);
$role = $function->get_my_role($my_info->role);
@endphp

<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <div class="user-img sidebar-profile-img">
                    <img src="{{ $my_info->user_image ? $my_info->user_image : asset('back-office/images/default_image.png') }}"
                        alt="User Image">
                </div>
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">{{ $display_name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('user.profile') }}"><i class="md md-face-unlock"></i> Profile<div
                                    class="ripple-wrapper"></div></a></li>
                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                        <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                    </ul>
                </div>
                <p class="text-muted m-0">{{ $role }}</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation </li>
                <li><a href="{{ route('dashboard') }}"
                        class="waves-effect {{ request()->is('dashboard') ? 'active' : '' }}"><i
                            class="ti-map"></i> <span> Dashboard </span> </a></li>
                <li class="has_sub">
                    <a href="{{ route('assets') }}"
                        class="waves-effect {{ request()->is('assets') ||request()->is('view-asset/*') ||request()->is('add-new-asset') ||request()->is('edit-asset/*')? 'active': '' }}"><i
                            class="ti-stats-up"></i> <span> Assets </span> </a>
                    <ul class="list-unstyled">
                        <li class="{{ request()->is('assets') ? 'active' : '' }}"><a
                                href="{{ route('assets') }}">All Assets</a></li>
                        <li class="{{ request()->is('add-new-asset') ? 'active' : '' }}"><a
                                href="{{ route('asset.create') }}">Add New Asset</a></li>
                        @if (request()->is('edit-asset/*'))
                            <li class="active"><a href="javascript:;">Editing Asset</a></li>
                        @endif
                        @if (request()->is('view-asset/*'))
                            <li class="active"><a href="javascript:;">Viewing Asset</a></li>
                        @endif
                    </ul>
                </li>
                @if ($role == 'Administrator')
                    <li>
                        <a href="{{ route('users.all') }}" class="waves-effect"><i class="ti-user"></i><span>Users </span> </a>
                    </li>
                @endif
                <li><a href="javascript:;" class="waves-effect"><i class="ti-shopping-cart"></i> <span> Investments
                        </span> </a></li>
                @if ($role == 'Administrator')
                    <li><a href="{{ route('user.profile') }}"
                            class="waves-effect {{ request()->is('my-profile') ? 'active' : '' }}"><i
                                class="ti-id-badge"></i> <span> Profile Settings</span> </a>
                    </li>
                @endif
                <li class="has_sub">
                    <a href="{{ route('payment-settings') }}" class="waves-effect {{ (request()->is('payment-settings')  || request()->is('api-settings')) ? 'active' : '' }}" class="waves-effect"><i class="ti-settings"></i> <span> Settings </span> </a>
                    <ul class="list-unstyled">
                        <li class="{{ request()->is('payment-settings') ? 'active' : '' }}"><a href="{{ route('payment-settings') }}">Payment Settings</a></li>
                        <li class="{{ request()->is('api-settings') ? 'active' : '' }}"><a href="{{ route('api-settings') }}">API Settings</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
