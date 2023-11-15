<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/be50e46cfb.js" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/cards.css') }}" rel="stylesheet" />

    <!-- Livewire CSS -->
    @livewireStyles

    <title>@yield('title')</title>
</head>

<body>
    <!-- header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-0">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand" href="{{ route('home.index') }}">
                    <img decoding="async" src="{{ url('/images/Logo.svg') }}" class="logo navbar-logo">
                </a>
                <div class="d-flex mx-5">
                    @livewire('search.search')
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active nav-text" href="{{ route('home.index') }}">@lang('app.navbar.home')</a>
                        </li>
                        <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                        <li class="nav-item">
                            <a class="nav-link active nav-text" href="{{ route('toy.index') }}">@lang('app.navbar.toys')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active nav-text" href="{{ route('technique.index') }}">@lang('app.navbar.techniques')</a>
                        </li>
                        <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                        <li class="nav-item">
                            <a class="nav-link active nav-text" href="{{ route('cart.index') }}"> <i class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                        <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link active nav-text" href="{{ route('login') }}">@lang('app.navbar.login')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active nav-text" href="{{ route('register') }}">@lang('app.navbar.register')</a>
                        </li>
                        @else
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" aria-current="page" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" aria-current="page" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if(Session::has('locale'))
                                    {{ strtoupper(Session::get('locale')) }}
                                    @else
                                    EN
                                    @endif
                                </a>
                                <ul class="dropdown-menu md-5">

                                    <a class="dropdown-item" style="color: black !important; font-size: 16px;" href="{{ route('changeLocale', ['locale'=> 'en']) }}"><b>EN -</b> @lang('app.navbar.en')</a>
                                    <a class="dropdown-item" style="color: black !important; font-size: 16px;" href="{{ route('changeLocale', ['locale'=> 'es']) }}"><b>ES -</b> @lang('app.navbar.es')</a>

                                </ul>
                            </li>
                        </ul>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- header -->
    @yield('content')
    <!-- footer -->
    <div class="cont-btn">
        <a href="{{ route('associate.index') }}" class="btn-wsp">
            <img class="btn-2" src="https://i.postimg.cc/wTWMsNRX/Logo-Miguapa-Mundi.png" alt="logo_miguapamundi">
        </a>
    </div>

    <footer class="footer">
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
    </footer>
    <!-- footer -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Livewire JS -->
    @livewireScripts

</body>

</html>