@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
    @if ($viewData['cartToys']==null && $viewData['cartTechniques']==null)
    <div class="text-center">
        <h1 class="title">@lang('app.cart.empty')</h1>
        <a href="{{ route('toy.index') }}" class="btn btn-outline mt-2 mb-4">@lang('app.cart.toys')</a>
        <a href="{{ route('technique.index') }}" class="btn btn-outline mt-2 mb-4">@lang('app.cart.techniques')</a>
    </div>
    @else
    <form action="{{ route('purchase.purchase') }}" method="POST">
        @csrf
        <div class="row">
            <h1 class="title">@lang('app.cart.cart')</h1>
            <div class='row'>
                <div class='col-3'>
                    <a href="{{ route('cart.removeAll') }}" class="btn btn-outline mt-2 mb-4">@lang('app.cart.empty')</a>
                </div>
                <div class='col-3 mt-2'>
                    <input type="text" name="toys" value="{{implode(',', $viewData['cartToys'])}}" hidden>
                    <input type="text" name="techniques" value="{{implode(',', $viewData['cartTechniques'])}}" hidden>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-money-bill"></i> @lang('app.cart.pay')</button>
                </div>
            </div>

            <div>
                @if (session('removed'))
                <div class="alert alert-danger" role="alert">
                    {{ session('removed') }}
                </div>
                @elseif (session('cart_emptied'))
                <div class="alert alert-danger" role="alert">
                    {{ session('cart_emptied') }}
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
                                <h7 class="card-subtitle"><b>@lang('app.cart.quantity'):</b></h7>
                            </div>
                            <div class="col mt-2">
                                <input type="number" class="form-control mb-2 field-width" placeholder="1" min="1" max="{{ $toy->getStock() }}" name="{{$toy->getId()}}" value="1" />
                            </div>
                            <div class="d-flex col justify-content-end mt-5">
                                <a href="{{ route('cart.removeToy', ['id'=> $toy->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach ($viewData['cartTechniques'] as $technique)
            <div class="col-4 d-flex">
                <div class="card me-2 mb-4" style="width: 18rem;">
                    <img src="{{ URL::asset('storage/'.$technique->getImage()) }}" class="card-img-top" alt="{{ $technique->getModel() }}" id="index-card-image">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('technique.show', ['id'=> $technique->getId()]) }}" id="card-title">{{ $technique->getModel() }}</a></h5>
                        <div class="row">
                            <div class="col d-block">
                                <h6 class="card-subtitle" id="card-price">${{ $technique->getPrice() }}</h6>
                            </div>
                            <div class="d-flex col justify-content-end mt-5">
                                <a href="{{ route('cart.removeTechnique', ['id'=> $technique->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </form>
    @endif
</div>
@endsection