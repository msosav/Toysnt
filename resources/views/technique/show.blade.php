@extends('layouts.app')
@section('title', $viewData['technique']->getModel())
@section('content')
<div class="col-md-4 col-lg-3 mb-2"> 
    <div class="card" style="width: 30rem;"> 
        <div class="row">
            <div class="col-sm">
            <img src="{{ URL::asset('storage/'.$viewData['technique']->getImage()) }}" class="card-img-top" alt="{{ $viewData['technique']->getModel() }}" id="index-card-image">
            </div>
            <div class="col-sm"> 
                <div class="row-sm">
                    <b><h5 class="card-title">{{ $viewData['technique']->getModel() }}</h5></b>
                    <p class="card-text">{{ $viewData['technique']->getDescription() }}</p>
                    <a href="{{ route('cart.addTechnique', ['id'=> $viewData['technique']->getId()]) }}" class="btn btn-outline">@lang('app.technique.cart')</a>
                </div>
                <div class="row-sm">
                    <b><h6 class="card-title">Reviews</h6></b>
                    @foreach($viewData['reviews'] as $review)
                    <p class="card-text">{{$review->getId()}}: {{ $review->getComment() }}</p>
                    @endforeach
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection