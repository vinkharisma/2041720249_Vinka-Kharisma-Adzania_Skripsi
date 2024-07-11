<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="/dashboard">
            <img src="{{ asset('/assets/img/pallet.png') }}" alt="logo" class="shadow-light rounded-circle mb-5 mt-2" style="margin-bottom: 0px !important; margin-top: 0px !important; width: 50px !important;">
        </a>
    </div>
    <ul class="sidebar-menu">

        <li class="menu-header">Starter</li>
        <li>
            <a class="nav-link" href="/home"><i class="far fa-square"></i> <span>Blank Page</span></a>
        </li>

        <!--Data Management-->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-chart-line"></i>
                <span>Data Management</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link " href="{{ route('data.index') }}">Data Table</a></li>
                <li><a class="nav-link " href="{{ route('palet-terpakai.index') }}">Data Table</a></li>
                <li><a class="nav-link " href="{{ route('palet-kosong.index') }}">Data Table</a></li>
            </ul>
        </li>

        <!--User Management-->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                <span>User Management</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link " href="{{ route('user.index') }}">Users List</a></li>
            </ul>
        </li>

        <!--Role Management-->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                <span>Role and Permission</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link " href="{{ route('role.index') }}">Role</a></li>
                <li><a class="nav-link " href="{{ route('permission.index') }}">Permission</a></li>
                <li><a class="nav-link " href="{{ route('assign.index') }}">Permission To Role</a></li>
                <li><a class="nav-link " href="{{ route('assign.user.index') }}">User To Role</a></li>
            </ul>
        </li>

        <!--Menu Management-->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-list"></i>
                <span>Menu Management</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link " href="{{ route('menu-group.index') }}">Menu Group</a></li>
                <li><a class="nav-link " href="{{ route('menu-item.index') }}">Menu Item</a></li>
            </ul>
        </li>

        <!--Prediction Management-->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-chart-line"></i>
                <span>Prediction Management</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link " href="{{ route('prediction.index') }}">Prediction Form</a></li>
            </ul>
        </li>

    </ul>
</aside>
