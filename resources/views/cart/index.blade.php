@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
    <div class="row">
        <h1 class="title">@lang('app.cart.cart')</h1>
        <div>
            <a href="{{ route('cart.removeAll') }}" class="btn btn-outline mt-2 mb-4">@lang('app.cart.empty')</a>
        </div>
        <div>
            @if (session('removed'))
            <div class="alert alert-danger" role="alert"> 
                {{ session('removed') }}
            </div>
            @elseif (session('toys_removed'))
            <div class="alert alert-danger" role="alert">
                {{ session('toys_removed') }}
            </div>
            @elseif (session('already_removed'))
            <div class="alert alert-danger" role="alert">
                {{ session('already_removed') }}
            </div>
            @endif
        </div>
        @foreach ($viewData['cartToys'] as $toy)
        <div class="col-4 d-flex">
            <div class="card me-2 mb-4" style="width: 18rem;">
                <img src="{{ URL::asset('storage/'.$toy->getImage()) }}" class="card-img-top" alt="{{ $toy->getModel() }}" id="index-card-image">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('toy.show', ['id'=> $toy->getId()]) }}" id="card-title">{{ $toy->getModel() }}</a></h5>
                    <div class="row">
                        <div class="col d-block">
                            <h6 class="card-subtitle" id="card-price">${{ $toy->getPrice() }}</h6>
                            <h7 class="card-subtitle"><small>@lang('app.toy.stock'): {{ $toy->getStock() }}</small></h6>
                        </div>
                        <div class="d-flex col justify-content-end">
                            <a href="{{ route('cart.remove', ['id'=> $toy->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection