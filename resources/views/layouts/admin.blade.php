<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/be50e46cfb.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
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
                    <a href="/admin" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-users"></i> @lang('adminNavbar.users')</a>
                </li>
                <li @if (Request::segment(2)=='toys' ) class="active" @endif>
                    <a href="{{ route('admin.toy.index') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-horse"></i> @lang('adminNavbar.toys')</a>
                </li>
                <li @if (Request::segment(2)=='techniques' ) class="active" @endif>
                    <a href="/admin" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-explosion"></i> @lang('adminNavbar.techniques')</a>
                </li>
                <li @if (Request::segment(2)=='reviews' ) class="active" @endif>
                    <a href="/admin" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-comment"></i> @lang('adminNavbar.reviews')</a>
                </li>
                <li @if (Request::segment(2)=='orders' ) class="active" @endif>
                    <a href="/admin" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-receipt"></i> @lang('adminNavbar.orders')</a>
                </li>
            </ul>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href=""><i class="fa-solid fa-user"></i> @yield('profileName', 'Profile')</a>
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