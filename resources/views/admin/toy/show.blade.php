@extends('layouts.admin')
@section('title', $viewData['title'])
@section('profileName', $viewData['auth_user']->getName())
@section('content')
@if (session('edited'))
<div class="alert alert-warning" role="alert">
    {{ session('edited') }}
</div>
@endif
<div class="card md-5 my-4 mx-4">
    <div class="row g-3">
        <div class="col-md-7">
            <img src="{{ URL::asset('storage/'.$viewData['toy']->getImage()) }}" class="img-fluid rounded-start" id="card-image">
        </div>
        <div class="col-md-3 my-5">
            <h1 id="show-title" class="py-1">{{ $viewData['toy']->getModel() }}</h1>
            <div class="class-body px-2 py-2 d-block">
                <h1 class="card-title" id="show-price">$ {{ $viewData['toy']->getPrice() }}</h1>
                <p class="card-text">{{ $viewData['toy']->getDescription() }}</p>
                <p class="card-text"><small class="text-muted">@lang('admin.toys.stock'): {{ $viewData['toy']->getStock() }}</small></p>
                <div class="sub_div py-2 flex justify-content-around">
                    <a href="{{ route('admin.toy.edit', ['id' => $viewData['toy']->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-pen"></i> @lang('admin.toys.edit')</a>
                    <a href="{{ route('admin.toy.delete', ['id' => $viewData['toy']->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-trash"></i> @lang('admin.toys.delete')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection