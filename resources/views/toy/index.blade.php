@extends('layouts.tabs')
@section('title', $viewData['title'])
@section('content_tabs')
<div class="container my-2 px-0">
    @foreach ($viewData['toys'] as $toy)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card" style="width: 18rem;">
            <img src="{{ $toy->getImage() }}" class="card-img-top" alt="{{ $toy->getModel() }}">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('toy.show', ['id'=> $toy['id']]) }}" id="card-title">{{ $toy->getModel() }}</a></h5>
                <div class="row">
                    <div class="col d-block">
                        <h6 class="card-subtitle" id="card-price">${{ $toy->getPrice() }}</h6>
                        <h7 class="card-subtitle"><small>@lang('toy.stock'): {{ $toy->getStock() }}</small></h6>
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