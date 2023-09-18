@extends('layouts.tabs')
@section('title', $viewData['title'])
@section('content_tabs')
@if ($viewData['techniques']!=null)
<h1 id="search-title" class="py-1">@lang('app.search.result') {{ $viewData['search'] }}</h1>
<div class="container row g-3 my-2 px-0">
    @foreach ($viewData['techniques'] as $technique)
    <div class="col-4 d-flex justify-content-start">
        <div class="card me-2" id="index-card">
            <img src="{{ URL::asset('storage/'.$technique->getImage()) }}" class="card-img-top" alt="{{ $technique->getModel() }}" id="index-card-image">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('technique.show', ['id'=> $technique->getId()]) }}" id="card-title">{{ $technique->getModel() }}</a></h5>
                <div class="row">
                    <div class="col d-block">
                        <h6 class="card-subtitle" id="card-price">${{ $technique->getPrice() }}</h6>
                    </div>
                    <div class="d-flex col justify-content-end">
                        @guest
                        <a href="{{ route('login') }}" class="btn btn-outline"><i class="fa-solid fa-cart-plus"></i></a>
                        @else
                        <a href="{{ route('cart.add', ['id'=> $technique->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-cart-plus"></i></a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="m-4">
    <p class="text-center" id="no_results">
        @lang('app.search.no_results')
    </p>
</div>
@endif
@endsection