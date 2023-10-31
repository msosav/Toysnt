@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
    @include('layouts.alerts')
    @if ($viewData['toysInCart']==null && $viewData['techniquesInCart']==null)
    <div class="text-center">
        <h1 class="title">@lang('app.cart.empty')</h1>
        <a href="{{ route('toy.index') }}" class="btn btn-outline mt-2 mb-4">@lang('app.cart.toys')</a>
        <a href="{{ route('technique.index') }}" class="btn btn-outline mt-2 mb-4">@lang('app.cart.techniques')</a>
    </div>
    @else
    <div class="row">
        <h1 class="title">@lang('app.cart.cart')</h1>
        <div class='row'>
            <div class='col-3'>
                <a href="{{ route('cart.remove', ['type' => 'all', 'id' => 'null']) }}" class="btn btn-outline mt-2 mb-4">@lang('app.cart.empty')</a>
            </div>
            <div class='col-3 mt-2'>
                <a href="{{ route('order.purchase') }}" type="button" class="btn btn-primary"><i class="fa-solid fa-money-bill"></i> @lang('app.cart.pay')</a>
            </div>
        </div>
        @foreach ($viewData['toysInCart'] as $toy)
        <div class="col-4 d-flex text-center">
            <div class="card me-2 mb-4" style="width: 18rem;">
                <img src="{{ URL::asset('storage/'.$toy->getImage()) }}" class="card-img-top" alt="{{ $toy->getName() }}" id="index-card-image">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('toy.show', ['id'=> $toy->getId()]) }}" id="card-title">{{ $toy->getName() }}</a></h5>
                    <div class="row">
                        <div class="col d-block">
                            <h6 class="card-subtitle" id="card-price">${{ $toy->getPrice() }}</h6>
                        </div>
                        @livewire('cart.cart-management', ['type' => 'toy', 'id' => $toy->getId()])
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @foreach ($viewData['techniquesInCart'] as $technique)
        <div class="col-4 d-flex">
            <div class="card me-2 mb-4" style="width: 18rem;">
                <img src="{{ URL::asset('storage/'.$technique->getImage()) }}" class="card-img-top" alt="{{ $technique->getName() }}" id="index-card-image">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('technique.show', ['id'=> $technique->getId()]) }}" id="card-title">{{ $technique->getName() }}</a></h5>
                    <div class="row">
                        <div class="col d-block">
                            <h6 class="card-subtitle" id="card-price">${{ $technique->getPrice() }}</h6>
                        </div>
                        @livewire('cart.cart-management', ['type' => 'technique', 'id' => $technique->getId()])
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection