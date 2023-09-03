<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <title>@yield('title')</title>
</head>

<body>
    <div class="container my-4">
        <nav class="nav flex-column text-center">
            <a class="navbar-brand" href="{{ route('admin.index') }}">
                <img src="{{ url('/images/Logo.svg') }}" alt="Logo" class="logo">
            </a>
            <a class="nav-link active" href="#">@lang('adminNavbar.users')</a>
            <a class="nav-link" href="#">@lang('adminNavbar.toys')</a>
            <a class="nav-link" href="#">@lang('adminNavbar.techniques')</a>
            <a class="nav-link" href="#">@lang('adminNavbar.reviews')</a>
            <a class="nav-link" href="#">@lang('adminNavbar.orders')</a>
        </nav>
        <div class="col-9">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>