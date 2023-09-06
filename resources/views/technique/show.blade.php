@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="col-md-4 col-lg-3 mb-2" style="margin: 15px;"> 
    <div class="card" style="width: 18rem;"> 
        <div class="row">
            <div class="col-sm">
                <img src="{{ $viewData['technique']->getImage() }}" class="card-img-top" alt="{{ $viewData['technique']->getModel() }}"> 
            </div>
            <div class="col-sm"> 
                <h5 class="card-title">{{ $viewData['technique']->getModel() }}</h5> 
                <h6 class="card-subtitle">id: {{ $viewData['technique']->getId() }}</h6> 
                <p class="card-text">{{ $viewData['technique']->getDescription() }}</p>
            </div> 
        </div>
    </div> 
</div> 
@endsection