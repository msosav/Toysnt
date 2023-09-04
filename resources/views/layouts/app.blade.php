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
                    <a class="nav-link active nav-text" href="">@lang('navbar.login')</a>
                    <a class="nav-link active nav-text" href="">@lang('navbar.register')</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- header -->

    <div class="container my-4">
        <div class="row gx-5">
            <div class="col-9">
                <div class="row justify-content-between">
                    <div class="col-5">
                        <div class="nav nav-tabs">
                            @if (isset($viewData['selected']) and $viewData['selected'] == 'techniques')
                                <li class="nav-item">
                                    <a class="nav-link bar" aria-current="page" href="{{ route('home.index') }}">@lang('navbar.toys')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active-tab" href="{{ route('technique.index') }}">@lang('navbar.techniques')</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link active-tab" aria-current="page" href="{{ route('home.index') }}">@lang('navbar.toys')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bar" href="{{ route('technique.index') }}">@lang('navbar.techniques')</a>
                                </li>
                            @endif
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group flex-nowrap">
                            @if (isset($viewData['selected']) and $viewData['selected'] == 'techniques')
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="@lang('search.technique')" aria-label="Search-Technique">
                                    <button class="btn" type="submit">@lang('search.search')</button>
                                </form>
                            @else
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="@lang('search.toy')" aria-label="Search-Toy">
                                    <button class="btn btn-outline" type="submit">@lang('search.search')</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
            <div class="col-3">
                <h2 class="title">@lang('titles.stats')</h2>
                @yield('stats')
            </div>
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