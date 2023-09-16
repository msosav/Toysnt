@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="d-flex flex-row py3 justify-content-between">
    <h1 class="title">@lang('admin.reviews.index')</h1>
    <div class="my-2">
        <a href="{{ route('admin.review.create') }}" class="btn btn-outline">@lang('admin.reviews.create')</a>
    </div>
</div>
<div class="row d-flex justify-content-center py-2 px-2">
    @if (session('created'))
    <div class="alert alert-success" role="alert">
        {{ session('created') }}
    </div>
    @elseif (session('deleted'))
    <div class="alert alert-danger" role="alert">
        {{ session('deleted') }}
    </div>
    @endif
    @foreach ($viewData['reviews'] as $review)
    <div class="card-body p-2">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-between">
                    <div class="col-5">
                        <h5 class="card-title">{{ $review->getRating() }} @lang('admin.reviews.stars')</h5>

                    </div>
                    <div class="col-5">
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('admin.review.show', ['id'=> $review['id']]) }}" id="admin-show"><i class="fa-solid fa-eye"></i> @lang('admin.reviews.show')</a>
                            <a href="{{ route('admin.review.edit', ['id'=> $review['id']]) }}" id="admin-edit"><i class="fa-solid fa-pen"></i> @lang('admin.reviews.edit')</a>
                            <a href="{{ route('admin.review.delete', ['id'=> $review['id']]) }}" id="admin-delete"><i class="fa-solid fa-trash"></i> @lang('admin.reviews.delete')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection