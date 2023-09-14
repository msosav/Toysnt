<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/be50e46cfb.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/cards.css') }}" rel="stylesheet" />
    <title>@yield('title')</title>
</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4">
                <img src="{{ url('/images/Nombre.svg') }}" alt="Nombre" class="logo mx-auto d-block admin-logo">
                <button class="btn d-md-none d-block close-btn px-1 py0 text-white"><i class="val fa-stream"></i></button>
            </div>
            <ul class="list-unstyled px-2">
                <li @if (Request::segment(2)=='users' ) class="active" @endif>
                    <a href="{{ route('admin.user.index') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-users"></i> @lang('admin.navbar.users')</a>
                </li>
                <li @if (Request::segment(2)=='toys' ) class="active" @endif>
                    <a href="{{ route('admin.toy.index') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-horse"></i> @lang('admin.navbar.toys')</a>
                </li>
                <li @if (Request::segment(2)=='techniques' ) class="active" @endif>
                    <a href="{{ route('admin.technique.index') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-explosion"></i> @lang('admin.navbar.techniques')</a>
                </li>
                <li @if (Request::segment(2)=='reviews' ) class="active" @endif>
                    <a href="/admin" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-comment"></i> @lang('admin.navbar.reviews')</a>
                </li>
                <li @if (Request::segment(2)=='orders' ) class="active" @endif>
                    <a href="/admin" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-receipt"></i> @lang('admin.navbar.orders')</a>
                </li>
            </ul>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse justify-content-end px-2" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item dropdown px-4">
                                <a class="nav-link dropdown-toggle" aria-current="page" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i> @yield('profileName', 'Profile')
                                </a>
                                <ul class="dropdown-menu md-5">
                                    <form id="logout" action="{{ route('logout') }}" method="POST">
                                        <li><a class="dropdown-item" onclick="document.getElementById('logout').submit();">@lang('admin.navbar.logout')</a></li>
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>