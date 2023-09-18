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
    @foreach ($viewData['techniques'] as $technique)
    <div class="col-4 d-flex justify-content-start">
        <div class="card me-2" style="width: 18rem;">
            <img src="{{ URL::asset('storage/'.$technique->getImage()) }}" class="card-img-top" alt="{{ $technique->getModel() }}" id="index-card-image">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('technique.show', ['id'=> $technique['id']]) }}" id="card-title">{{ $technique->getModel() }}</a></h5>
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
@endsection