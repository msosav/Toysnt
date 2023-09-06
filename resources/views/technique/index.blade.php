@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
@foreach ($viewData['technique'] as $technique) 
<div class="col-md-4 col-lg-3 mb-2" style="margin: 15px;"> 
    <div class="card" style="width: 18rem;"> 
        <img src="{{ $technique['image'] }}" class="card-img-top" alt="{{ $technique['model'] }}"> 
        <div class="card-body"> 
            <h5 class="card-title">
                <a href="{{ route('technique.show', ['id'=> $technique['id']]) }}">{{ $technique->getModel() }}</a>
            </h5> 
            <h6 class="card-subtitle">id: {{ $technique->getId() }}</h6> 
        </div> 
    </div> 
</div> 
@endforeach
@endsection