@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('admin.reviews.edit'): {{ $viewData['technique_name'] }} review</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('admin.review.update', ['id' => $viewData['review']->getId()]) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="@lang('admin.reviews.comment')" name="comment" value="{{ $viewData['review']->getComment() }}" />
                        <input type="text" class="form-control mb-2" placeholder="@lang('admin.reviews.rating')" name="rating" value="{{ $viewData['review']->getRating() }}" />
                        <select class="form-control mb-2" placeholder="@lang('admin.reviews.technique')" name="technique" value="{{ $viewData['review']->getTechniqueId() }}">
                            @foreach ($viewData['techniques'] as $technique)
                            <option value="{{ $technique->getId() }}">{{ $technique->getName() }}</option>
                            @endforeach
                        </select>
                        <p></p>
                        <div class="text-center">
                            <input type="submit" class="btn btn-danger" value="@lang('admin.reviews.edit')" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection