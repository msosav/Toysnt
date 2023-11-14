@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<section id="home">
    <div class="container py-4">
        <div class="row py-3">
            <div class="col-lg-7 text-center">
                <h1 class="pt-5">@lang('app.home.message')</h1>
                <a type="button" href="{{ route('toy.index') }}" class="btn btn1 mt-3 text-center py-2">
                    @lang('app.home.button')
                </a>
                <div class="col mt-5">
                    <h5>
                        <a class="more-info" href="#top-toys">
                            <p>@lang('app.home.info')</p>
                            <div class="d-flex justify-content-center">
                                <i class="fa-solid fa-angles-down"></i>
                            </div>
                        </a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container" id="top-toys">
    <div class="mt-5 mb-4">
        <h1 class="text-center">@lang('app.home.top_toys')</h1>
    </div>
    <div class="d-flex justify-content-center mb-4">
        <div class="row">
            @foreach ($viewData['toys'] as $toy)
            <div class="col-md-4 col-lg-4 mb-4 mt-3 ml-4">
                <div class="card index-card">
                    @if ($toy->getStorage() == "local")
                    <img src="{{ URL::asset('storage/'.$toy->getImage()) }}" class="card-img-top index-image" alt="{{ $toy->getName() }}">
                    @endif

                    @if ($toy->getStorage() == "gcp")
                    <img src="{{ $toy->getImage() }}" class="card-img-top index-image" alt="{{ $toy->getName() }}">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="{{ route('toy.show', ['id'=> $toy->getId()]) }}" id="card-title">{{ $toy->getName() }}</a></h5>
                        <h6 class="card-subtitle card-price">${{ $toy->getPrice() }}</h6>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>
<section class="container" id="top-techniques">

    <div class="mt-4 mb-4">
        <h1 class="text-center">@lang('app.home.top_techniques')</h1>
    </div>
    <div class="d-flex justify-content-center mb-4">
        <div class="row">
            @foreach ($viewData['techniques'] as $technique)
            <div class="col-md-4 col-lg-4 mb-4 mt-3 ml-4">
                <div class="card index-card">
                    <img src="{{ URL::asset('storage/'.$technique->getImage()) }}" class="card-img-top index-image" alt="{{ $technique->getName() }}">
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="{{ route('technique.show', ['id'=> $technique->getId()]) }}" id="card-title">{{ $technique->getName() }}</a></h5>
                        <h6 class="card-subtitle card-price">${{ $technique->getPrice() }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

</section>

<div class="center mb-2">
    <small>@lang('app.home.ip') <b>{{$viewData['apiIp']}}</b>, @lang('app.home.from') <b>{{$viewData['apiCity']}}, {{$viewData['apiCountry']}}.</b></small>
</div>


@endsection