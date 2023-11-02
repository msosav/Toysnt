@extends('layouts.app')
@section('title', $viewData['technique']->getName())
@section('content')
<div class="container my-4">
    @include('layouts.alerts')
    <h1 id="show-title" class="py-1">{{ $viewData['technique']->getName() }}</h1>
    <div class="row g-5">
        <div class="col-md-7">
            <img src="{{ URL::asset('storage/'.$viewData['technique']->getImage()) }}" class="img img-fluid rounded" id="card-image">
        </div>
        <div class="col-md-3 text-center">
            <div class="px-2 py-2 d-block">
                <p class="card-title" id="show-price">$ {{ $viewData['technique']->getPrice() }}</p>
                <p class="card-text" id="show-description">{{ $viewData['technique']->getDescription() }}</p>
                @livewire('cart.cart-management', ['type' => 'technique', 'id' => $viewData['technique']->getId()])
                <a id="terms-and-conditions" target="_blank" rel="noopener" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">@lang('app.terms_and_conditions')</a>
            </div>
        </div>
        @include('layouts.comments')
    </div>
</div>
@endsection