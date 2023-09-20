@extends('layouts.app')
@section('title', $viewData['toy']->getModel())
@section('content')
<h1 id="show-title" class="py-1">{{ $viewData['toy']->getModel() }}</h1>
<div class="row g-5">
    <div class="col-md-7">
        <img src="{{ URL::asset('storage/'.$viewData['toy']->getImage()) }}" class="img img-fluid rounded" id="card-image">
    </div>
    <div class="col-md-3">
        <div class="px-2 py-2 d-block">
            <p class="card-title" id="show-price">$ {{ $viewData['toy']->getPrice() }}</p>
            <p class="card-text" id="show-description">{{ $viewData['toy']->getDescription() }}</p>
            <p class="card-text"><small class="text-muted">@lang('app.toy.stock'): {{ $viewData['toy']->getStock() }}</small></p>
            <a href="{{ route('cart.add', ['id'=> $viewData['toy']->getId()]) }}" class="btn btn-outline">@lang('app.toy.cart')</a>
        </div>
        <a id="terms-and-conditions" target="_blank" rel="noopener" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">@lang('app.terms_and_conditions')</a>
    </div>
</div>
<div class="row d-flex justify-content-center py-5 px-2">
    <div class="card-body p-4">
        <div class="container d-flex justify-content-between">
            <span id="sub-title" class="m-1">
                @lang('app.reviews.total'):
                <span>
                    {{ $viewData['reviewCount'] }}
                </span>
            </span>
            @guest
            <a href="{{ route('login') }}" type="button" class="btn btn-outline">@lang('app.reviews.new')</a>
            @else
            <a href="{{ route('review.new') }}" type="button" class="btn btn-outline">@lang('app.reviews.new')</a>
            @endguest
        </div>
        @if (session('newComment'))
        <form action="{{ route('review.save', ['type' => 'toy', 'id' => $viewData['toy']->getId()]) }}" method="POST">
            @csrf
            <div class="card m-2">
                <div class="card-body d-flex justify-content-between">
                    <div class="row">
                        <textarea class="mx-3" name="comment" id="comment-text" cols="30" rows="10" placeholder="@lang('app.reviews.review')" required></textarea>
                        <input name="rating" class="mx-3" type="text" placeholder="@lang('app.reviews.rating')" id="rating-text" required>
                        <div class="my-3" id="review-submit">
                            <button class="btn btn-outline" type="submit">@lang('app.reviews.submit')</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif
        @foreach ($viewData['reviews'] as $review)
        <div class="card m-2">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <p>{{$review->getComment()}}</p>
                    <p class="mb-0"><i class="fa-solid fa-star"></i> {{$review->getRating()}}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-start">
                        <p class="small mb-0">{{$review->getUser()->getName()}} <small>{{ $review->getUpdated_at() }}</small></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection