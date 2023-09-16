@extends('layouts.tabs')
@section('title', $viewData['title'])
@section('content_tabs')
<div class="container row g-3 my-2 px-0">
    @foreach ($viewData['techniques'] as $technique)
    <div class="col-4 d-flex justify-content-start">
        <div class="card me-2" style="width: 18rem;">
            <img src="{{ URL::asset('storage/'.$technique->getImage()) }}" class="card-img-top" id="index-card-image">
            <div class="card-body">
                <a href="{{ route('technique.show', ['id'=> $technique->getId()]) }}">{{ $technique->getModel() }}</a>
                <div class="row">
                    <div class="col d-block">
                        <h6 class="card-subtitle" id="card-price">${{ $technique->getPrice() }}</h6>
                    </div>
                    <div class="d-flex col justify-content-end">
                        <a href="" class="btn btn-outline"><i class="fa-solid fa-cart-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection