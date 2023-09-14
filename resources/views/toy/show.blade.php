@extends('layouts.app')
@section('title', $viewData['toy']->getModel())
@section('content')
<h1 id="show-title" class="py-1">{{ $viewData['toy']->getModel() }}</h1>
<div class="row g-5">
    <div class="col-md-7">
        <img src="{{ URL::asset('storage/'.$viewData['toy']->getImage()) }}" class="img img-fluid rounded" id="card-image">
    </div>
    <div class="col-md-3">
        <div class="card" id="toy-information">
            <div class="class-body px-2 py-2 d-block">
                <h1 class="card-title" id="show-price">$ {{ $viewData['toy']->getPrice() }}</h1>
                <p class="card-text">{{ $viewData['toy']->getDescription() }}</p>
                <p class="card-text"><small class="text-muted">@lang('app.toy.stock'): {{ $viewData['toy']->getStock() }}</small></p>
                <a href="" class="btn btn-outline">@lang('app.toy.cart')</a>
            </div>
            <a id="terms-and-conditions" target="_blank" rel="noopener" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">@lang('app.terms_and_conditions')</a>
        </div>
    </div>
</div>
@endsection