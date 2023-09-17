@extends('layouts.tabs')
@section('title', $viewData['title'])
@section('content_tabs')
@if ($viewData['toys']!=null)
<h1 id="search-title" class="py-1">@lang('app.search.result') {{ $viewData['search'] }}</h1>
<div class="container row g-3 my-2 px-0">
    <div class="col d-flex justify-content-start">
        @foreach ($viewData['toys'] as $toy)
        <div class="card me-2" id="index-card">
            <img src="{{ URL::asset('storage/'.$toy->getImage()) }}" class="card-img-top" alt="{{ $toy->getModel() }}" id="index-card-image">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('toy.show', ['id'=> $toy['id']]) }}" id="card-title">{{ $toy->getModel() }}</a></h5>
                <div class="row">
                    <div class="col d-block">
                        <h6 class="card-subtitle" id="card-price">${{ $toy->getPrice() }}</h6>
                        <h7 class="card-subtitle"><small>@lang('app.toy.stock'): {{ $toy->getStock() }}</small></h6>
                    </div>
                    <div class="d-flex col justify-content-end">
                        <a href="" class="btn btn-outline"><i class="fa-solid fa-cart-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<p>oops</p>
@endif
@endsection