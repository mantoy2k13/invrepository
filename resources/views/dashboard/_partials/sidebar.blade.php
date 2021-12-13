<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation </li>
                <li><a href="{{ route('dashboard') }}" class="waves-effect {{ request()->is('admin/dashboard') ? 'active' : '' }}"><i class="ti-map"></i> <span> Dashboard </span> </a></li>
                <li class="has_sub">
                    <a href="{{ route('assets') }}" class="waves-effect {{ (request()->is('admin/assets') || request()->is('admin/add-new-asset')) ? 'active' : '' }}"><i class="ti-stats-up"></i> <span> Assets </span> </a>
                    <ul class="list-unstyled">
                        <li class="{{ request()->is('admin/assets') ? 'active' : '' }}"><a href="{{ route('assets') }}">All Assets</a></li>
                        <li class="{{ request()->is('admin/add-new-asset') ? 'active' : '' }}"><a href="{{ route('asset.create') }}">Add New Asset</a></li>
                    </ul>
                </li>
                <li><a href="javascript:;" class="waves-effect"><i class="ti-user"></i> <span> Users </span> </a></li>
                <li><a href="javascript:;" class="waves-effect"><i class="ti-shopping-cart"></i> <span> Investments </span> </a></li>
                <li><a href="javascript:;" class="waves-effect"><i class="ti-id-badge"></i> <span> Profile Settings</span> </a></li>
                <li class="has_sub">
                    <a href="javascript:;" class="waves-effect"><i class="ti-settings"></i> <span> Settings </span> </a>
                    <ul class="list-unstyled">
                        <li><a href="javascript:;">Payment Settings</a></li>
                        <li><a href="javascript:;">API Settings</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->