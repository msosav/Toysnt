@extends('layouts.tabs')
@section('title', $viewData['title'])
@section('content_tabs')
<div class="container row g-3 my-2 px-0">
    @include('layouts.alerts')
    @foreach ($viewData['toys'] as $toy)
    <div class="col-4 d-flex justify-content-start">
        <div class="card me-2" id="index-card">
            <img src="{{ URL::asset('storage/'.$toy->getImage()) }}" class="card-img-top" alt="{{ $toy->getName() }}" id="index-card-image">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('toy.show', ['id'=> $toy->getId()]) }}" id="card-title">{{ $toy->getName() }}</a></h5>
                <div class="row">
                    <div class="col d-block">
                        <h6 class="card-subtitle" id="card-price">${{ $toy->getPrice() }}</h6>
                        <h7 class="card-subtitle"><small><b>@lang('app.toy.stock'):</b> {{ $toy->getStock() }}</small></h6>
                    </div>
                    @if ($toy->getStock() == 0)
                    <div class="d-flex col justify-content-end">
                        <small><b>@lang('app.toy.out_of_stock')</b></small>
                    </div>
                    @else
                    @livewire('cart.cart-management', ['type' => 'toy', 'id' => $toy->getId()])
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@section('stats')
<div id="sub-title" class="mb-3"><b>@lang('app.stats.top_toys')</b></div>
<div class="row-4 d-flex align-items-center">

    <table class="table table-warning ">
        <thead>
            <tr>
                <th scope="col">@lang('app.stats.toy')</th>
                <th scope="col">@lang('app.stats.quantity')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewData['stats'] as $key => $value)
            <tr class="table-active">
                <td>{{$key}}</td>
                <td>{{$value}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection