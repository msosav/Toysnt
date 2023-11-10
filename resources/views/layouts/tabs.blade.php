@extends('layouts.app')
@section('content')
<div class="container my-4">
    <div class="row gx-5">
        <div class="col-9">
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
            @yield('content_tabs')
        </div>

    </div>
</div>
@endsection