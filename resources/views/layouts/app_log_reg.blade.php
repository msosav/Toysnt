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
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-1">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="{{ url('/images/Logo.svg') }}" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active nav-text" href="">@lang('navbar.home')</a>
                    <a class="nav-link active nav-text" href="">@lang('navbar.cart')</a>
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                    @guest
                    <a class="nav-link active nav-text" href="{{ route('login') }}">@lang('navbar.login')</a>
                    <a class="nav-link active nav-text" href="{{ route('register') }}">@lang('navbar.register')</a>
                    @else 
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">Logout</a>
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <!-- header -->

    <div class="container my-4 mt-5 mb-5">
        <div class="">
            @yield('content')
        </div>    
    </div>

    <!-- footer -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Copyright -
                <a class="text-reset fw-bold text-decoration-none" target="_blank" href="https://github.com/cpalacior">
                    Camilo Palacio
                </a>
                <span>-</span>
                <a class="text-reset fw-bold text-decoration-none" target="_blank" href="https://github.com/msosav">
                    Miguel Sosa
                </a>
                <span>-</span>
                <a class="text-reset fw-bold text-decoration-none" target="_blank" href="https://github.com/EsteTruji">
                    Esteban Trujillo
                </a>
            </small>
        </div>
    </div>
    <!-- footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>