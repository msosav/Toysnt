@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
@include('layouts.alerts')
<div class="card md-5 my-4 mx-4">
    <div class="row g-3">
        <div class="col-md-7">
            <img src="{{ URL::asset('storage/'.$viewData['technique']->getImage()) }}" class="img-fluid rounded-start" id="card-image">
        </div>
        <div class="col-md-3 my-5">
            <h1 id="show-title" class="py-1">{{ $viewData['technique']->getModel() }}</h1>
            <div class="class-body px-2 py-2 d-block">
                <h1 class="card-title" id="show-price">$ {{ $viewData['technique']->getPrice() }}</h1>
                <p class="card-text">{{ $viewData['technique']->getDescription() }}</p>
                <div class="sub_div py-2 flex justify-content-around">
                    <a href="{{ route('admin.technique.edit', ['id' => $viewData['technique']->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-pen"></i> @lang('admin.techniques.edit')</a>
                    <a href="{{ route('admin.technique.delete', ['id' => $viewData['technique']->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-trash"></i> @lang('admin.techniques.delete')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection