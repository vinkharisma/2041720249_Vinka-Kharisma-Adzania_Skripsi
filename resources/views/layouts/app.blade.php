<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        {{-- <title>{{ config('app.name') }} </title> --}}
        <title> Pallet Stock Prediction </title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css" />

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
        @stack('customStyle')

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap Datepicker CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

    </head>

    <body class="sidebar-mini">
        <div id="app">
            <div class="main-wrapper">
                <div class="navbar-bg"></div>
                <nav class="navbar navbar-expand-lg main-navbar">
                    <form class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                        class="fas fa-bars"></i></a></li>
                            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                        class="fas fa-search"></i></a></li>
                        </ul>
                        {{-- <div class="search-element">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                data-width="250">
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            <div class="search-backdrop"></div>
                            <div class="search-result">
                                <div class="search-header">
                                    Histories
                                </div>
                                <div class="search-item">
                                    <a href="#">How to hack NASA using CSS</a>
                                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                                </div>
                                <div class="search-item">
                                    <a href="#">Kodinger.com</a>
                                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                                </div>
                                <div class="search-item">
                                    <a href="#">#Stisla</a>
                                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                                </div>
                                <div class="search-header">
                                    Result
                                </div>
                                <div class="search-item">
                                    <a href="#">
                                        <img class="mr-3 rounded" width="30" src="/assets/img/products/product-3-50.png"
                                            alt="product">
                                        oPhone S9 Limited Edition
                                    </a>
                                </div>
                                <div class="search-item">
                                    <a href="#">
                                        <img class="mr-3 rounded" width="30" src="/assets/img/products/product-2-50.png"
                                            alt="product">
                                        Drone X2 New Gen-7
                                    </a>
                                </div>
                                <div class="search-item">
                                    <a href="#">
                                        <img class="mr-3 rounded" width="30" src="/assets/img/products/product-1-50.png"
                                            alt="product">
                                        Headphone Blitz
                                    </a>
                                </div>
                                <div class="search-header">
                                    Projects
                                </div>
                                <div class="search-item">
                                    <a href="#">
                                        <div class="search-icon bg-danger text-white mr-3">
                                            <i class="fas fa-code"></i>
                                        </div>
                                        Stisla Admin Template
                                    </a>
                                </div>
                                <div class="search-item">
                                    <a href="#">
                                        <div class="search-icon bg-primary text-white mr-3">
                                            <i class="fas fa-laptop"></i>
                                        </div>
                                        Create a new Homepage Design
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                    </form>
                    <ul class="navbar-nav navbar-right">
                        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                <div class="dropdown-header">Messages
                                    <div class="float-right">
                                        <a href="#">Mark All As Read</a>
                                    </div>
                                </div>
                        </li>

                        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            {{-- <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                <div class="dropdown-item-icon bg-primary text-white">
                                    <i class="fas fa-code"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    Template update is available now!
                                    <div class="time text-primary">2 Min Ago</div>
                                </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                <div class="dropdown-item-icon bg-info text-white">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                                    <div class="time">10 Hours Ago</div>
                                </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                <div class="dropdown-item-icon bg-success text-white">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                    <div class="time">12 Hours Ago</div>
                                </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                <div class="dropdown-item-icon bg-danger text-white">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    Low disk space. Let's clean it!
                                    <div class="time">17 Hours Ago</div>
                                </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                <div class="dropdown-item-icon bg-info text-white">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    Welcome to Stisla template!
                                    <div class="time">Yesterday</div>
                                </div>
                                </a>
                            </div> --}}
                            {{-- <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div> --}}
                            </div>
                        </li>

                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <img alt="image" src="{{ asset('/assets/img/avatar/avatar-4.png') }}" class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">

                                {{-- Profile --}}
                                <a href="{{ route('profile.index') }}" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                {{-- Activities --}}
                                {{-- <a href="features-activities.html" class="dropdown-item has-icon">
                                    <i class="fas fa-bolt"></i> Activities
                                </a> --}}
                                {{-- About --}}
                                {{-- <a href="features-settings.html" class="dropdown-item has-icon">
                                    <i class="fas fa-cog"></i> About
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                {{-- Logout --}}
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="main-sidebar">
                    <x-sidebar title="PREDICTION" />
                    {{-- @include('layouts.sidebar') --}}
                </div>

                <!-- Main Content -->
                <div class="main-content">
                    @yield('content')
                </div>
                <footer class="main-footer">
                    @include('layouts.footer')
                </footer>
            </div>
        </div>

        <!-- General JS Scripts -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="{{ asset('/assets/js/stisla.js') }}"></script>

        <!-- JS Libraies -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ asset('/assets/js/page/modules-sweetalert.js') }}"></script>
        <script src="{{ asset('/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

        <!-- Template JS File -->
        <script src="{{ asset('/assets/js/scripts.js') }}"></script>
        <script src="{{ asset('/assets/js/custom.js') }}"></script>

        <!-- Page Specific JS File -->
        @stack('customScript')

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

        {{-- <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap JS (optional if not already included) -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Bootstrap Datepicker JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> --}}

        @yield('js')

    </body>

</html>
