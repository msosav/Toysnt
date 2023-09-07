@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
@foreach ($viewData['techniques'] as $technique) 
<div class="col-md-4 col-lg-3 mb-2"> 
    <div class="card" style="width: 18rem;"> 
        <img src="{{ $technique->getImage() }}" class="card-img-top" alt="{{ $technique->getModel() }}"> 
        <div class="card-body"> 
            <h5 class="card-title">
                <a href="{{ route('technique.show', ['id'=> $technique->getId()]) }}">{{ $technique->getModel() }}</a>
            </h5> 
            <h6 class="card-subtitle">id: {{ $technique->getId() }}</h6> 
        </div> 
    </div> 
</div> 
@endforeach
@endsection