@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
@if (session('edited'))
<div class="alert alert-warning" role="alert">
    {{ session('edited') }}
</div>
@endif
<div class="card md-5 my-4 mx-4">
    <div class="row g-3">
        <div class="col-md-3 my-5">
            <h1 id="show-title" class="py-1">{{ $viewData['title'] }}</h1>
            <div class="class-body px-2 py-2 d-block">
                <h1 class="card-title" id="show-price">{{ $viewData['review']->getRating() }}</h1>
                <p class="card-text">{{ $viewData['review']->getComment() }}</p>
                <div class="sub_div py-2 flex justify-content-around">
                    <a href="{{ route('admin.review.edit', ['id' => $viewData['review']->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-pen"></i> @lang('admin.reviews.edit')</a>
                    <a href="{{ route('admin.review.delete', ['id' => $viewData['review']->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-trash"></i> @lang('admin.reviews.delete')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection