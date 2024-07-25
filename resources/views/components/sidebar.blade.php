<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="/dashboard">{{ $title }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="/dashboard">
            <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">

            <img src="{{ asset('/assets/img/pallet.png') }}" alt="logo" class="shadow-light rounded-circle mb-5 mt-2" style="margin-bottom: 0px !important; margin-top: 0px !important; width: 50px !important;">
        </a>
    </div>
    <ul class="sidebar-menu">
        @foreach ($menuGroups as $item)
            @can($item->permission_name)
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="{{ $item->icon }}"></i>
                        <span>{{ $item->name }}</span></a>
                    <ul class="dropdown-menu">
                        @foreach ($item->menuItems as $menuItem)
                            @can($menuItem->permission_name)
                                <li>
                                    <a class="nav-link" href="{{ url($menuItem->route) }}">{{ $menuItem->name }}</a>
                                </li>
                            @endcan
                        @endforeach
                    </ul>
                </li>
            @endcan
        @endforeach
    </ul>
</aside>
