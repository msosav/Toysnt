@extends('layouts.app')
@section('content')
<div class="container my-4">
    <div class="row gx-5">
        <div class="col-9">
            <div class="row justify-content-between">
                <div class="col-5">
                    <div class="nav nav-tabs">
                        <li class="nav-item">
                            <a @if (Request::segment(1)=='' or Request::segment(1)=='toys' ) class="nav-link active-tab" @else class="nav-link bar" @endif href="{{ route('toy.index') }}">
                                @lang('app.navbar.toys')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a @if (Request::segment(1)=='techniques' ) class="nav-link active-tab" @else class="nav-link bar" @endif href="{{ route('technique.index') }}">
                                @lang('app.navbar.techniques')
                            </a>
                        </li>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group flex-nowrap">
                        @if (Request::segment(1)=='techniques')
                        <form class="d-flex" method="POST" action="{{ route('technique.search') }}">
                            @csrf
                            <input class="form-control me-2" type="search" placeholder="@lang('app.search.technique')" aria-label="Search-Technique" name="search">
                            <button class="btn btn-outline" type="submit">@lang('app.search.search')</button>
                        </form>
                        @else
                        <form class="d-flex" method="POST" action="{{ route('toy.search') }}">
                            @csrf
                            <input class="form-control me-2" type="search" placeholder="@lang('app.search.toy')" aria-label="Search-Toy" name="search">
                            <button class="btn btn-outline" type="submit">@lang('app.search.search')</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @yield('content_tabs')
        </div>
        <div class="col-3">
            <h2 class="title">@lang('app.titles.stats')</h2>
            @yield('stats')
        </div>
    </div>
</div>
@endsection