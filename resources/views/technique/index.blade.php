@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container my-4">
    @include('layouts.alerts')
    <div class="mb-5 mt-4 center">
        <h1 class="title"><b>@lang('app.home.techniques_section')</b></h1>
        <hr width="92.5%" size="8px" color="orange" />
    </div>
    <div class="card-group">
        @foreach ($viewData['techniques'] as $technique)
        <div class="col-md-4 col-lg-4 mb-4 mt-1 ml-4">
            <div class="card index-card h-100">
                <img src="{{ URL::asset('storage/'.$technique->getImage()) }}" class="card-img-top index-image" alt="{{ $technique->getName() }}">
                <div class="card-body text-center">
                    <h5 class="card-title"><a href="{{ route('technique.show', ['id'=> $technique->getId()]) }}" id="card-title">{{ $technique->getName() }}</a></h5>
                    <h6 class="card-subtitle card-price">${{ $technique->getPrice() }}</h6>
                    @livewire('cart.cart-management', ['type' => 'technique', 'id' => $technique->getId()])
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection