@extends('layouts.tabs')
@section('title', $viewData['title'])
@section('content_tabs')
<div class="container row g-3 my-2 px-0">
    @if (session('added'))
    <div class="alert alert-success" role="alert">
        {{ session('added') }}
    </div>
    @elseif (session('already_added'))
    <div class="alert alert-danger" role="alert">
        {{ session('already_added') }}
    </div>
    @endif
    @foreach ($viewData['toys'] as $toy)
    <div class="col-4 d-flex justify-content-start">
        <div class="card me-2" id="index-card">
            <img src="{{ URL::asset('storage/'.$toy->getImage()) }}" class="card-img-top" alt="{{ $toy->getModel() }}" id="index-card-image">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('toy.show', ['id'=> $toy->getId()]) }}" id="card-title">{{ $toy->getModel() }}</a></h5>
                <div class="row">
                    <div class="col d-block">
                        <h6 class="card-subtitle" id="card-price">${{ $toy->getPrice() }}</h6>
                        <h7 class="card-subtitle"><small><b>@lang('app.toy.stock'):</b> {{ $toy->getStock() }}</small></h6>
                    </div>
                    <div class="d-flex col justify-content-end">
                        @guest
                        <a href="{{ route('login') }}" class="btn btn-outline"><i class="fa-solid fa-cart-plus"></i></a>
                        @else
                        <a href="{{ route('cart.addToy', ['id'=> $toy->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-cart-plus"></i></a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection