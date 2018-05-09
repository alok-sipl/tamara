<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <div class="stats-label text-color">
                {{--<span class="font-extra-bold font-uppercase">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>--}}
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <small class="text-muted">Links <b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated flipInX m-t-xs">
                        <li><a href="#">Example link</a></li>
                        <li><a href="#">Example link</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li><a href="{{ url('admin/dashboard') }}" title="Dashboard"><span class="nav-label">Dashboard</span></a></li>
            <li><a href="{{ url('admin/user') }}" title="Users"><span class="nav-label">Users</span></a></li>
            <li><a href="{{ url('admin/user/bulk-upload') }}" title="Bulk Upload"><span class="nav-label">Bulk Upload</span></a></li>
            <li><a href="{{ url('admin/campaign') }}" title="Campaign"><span class="nav-label">Campaign</span></a></li>
            <li><a href="{{ url('admin/smsCustomer') }}" title="SMS Customer"><span class="nav-label">SMS Customer</span></a></li>
            <li><a href="{{ url('admin/emailCustomer') }}" title="Email Customer"><span class="nav-label">Email Customer</span></a></li>
        </ul>
    </div>
</aside>