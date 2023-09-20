@extends('layouts.tabs')
@section('title', $viewData['title'])
@section('content_tabs')
<div class="container row g-3 my-2 px-0">
    @if (session('added'))
    <div class="alert alert-success d-flex justify-content-between" role="alert">
        {{ session('added') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @elseif (session('already_added'))
    <div class="alert alert-danger d-flex justify-content-between" role="alert">
        {{ session('already_added') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @elseif (session('purchase_successful'))
    <div class="alert alert-success d-flex justify-content-between" role="alert">
        {{ session('purchase_successful') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @elseif (session('purchase_failed'))
    <div class="alert alert-danger d-flex justify-content-between" role="alert">
        {{ session('purchase_failed') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @elseif (session('add_some_toys'))
    <div class="alert alert-danger d-flex justify-content-between" role="alert">
        {{ session('add_some_toys') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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
                        <a href="{{ route('cart.addToy', ['id'=> $toy->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-cart-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection