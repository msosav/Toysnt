<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/be50e46cfb.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/cards.css') }}" rel="stylesheet" />
    <title>@yield('title')</title>
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-0">
        <div class="container">
            <a class="navbar-brand" href="{{ route('toy.index') }}">
                <img src="{{ url('/images/Logo.svg') }}" alt="Logo" class="logo navbar-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active nav-text" href="{{ route('toy.index') }}">@lang('app.navbar.home')</a>
                    <a class="nav-link active nav-text" href="{{ route('cart.index') }}"> <i class="fa-solid fa-cart-shopping"></i></a>
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                    @guest
                    <a class="nav-link active nav-text" href="{{ route('login') }}">@lang('app.navbar.login')</a>
                    <a class="nav-link active nav-text" href="{{ route('register') }}">@lang('app.navbar.register')</a>
                    @else
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown px-4">
                            <a class="nav-link dropdown-toggle" aria-current="page" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"></i> {{ auth()->user()->getName() }}
                            </a>
                            <ul class="dropdown-menu md-5">
                                <div class="ms-3 mb-1">
                                    <b>@lang('admin.users.balance'): </b> ${{ auth()->user()->getBalance() }}
                                </div>
                                <li>
                                    <a class="dropdown-item d-flex justify-content-between" href="{{ route('order.index') }}">@lang('app.orders.my_orders') <i class="fa-solid fa-table-columns"></i></a>
                                </li>
                                @if (auth()->user()->getRole() == 'admin')
                                <li><a class="dropdown-item d-flex justify-content-between" href="{{ route('admin.user.index') }}">@lang('app.navbar.admin') <i class="fa-solid fa-table-columns"></i></a></li>
                                @endif
                                <div class="dropdown-divider"></div>
                                <form id="logout" action="{{ route('logout') }}" method="POST">
                                    <li><a class="dropdown-item d-flex justify-content-between" onclick="document.getElementById('logout').submit();">@lang('admin.navbar.logout') <i class="fa-solid fa-right-from-bracket mt-1"></i></a></li>
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    </ul>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <!-- header -->
    <div class="container my-4">
        @yield('content')
    </div>
    <!-- footer -->
    <div class="fixed-bottom">
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
    </div>
    <!-- footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>