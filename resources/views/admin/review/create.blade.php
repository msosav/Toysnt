@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('admin.reviews.create')</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('admin.review.save') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="number" class="form-control mb-2" placeholder=@lang('admin.reviews.rating') min="0" max="5" name="rating" value="{{ old('rating') }}" required/>
                        <input type="text" class="form-control mb-2" placeholder=@lang('admin.reviews.comment') name="comment" value="{{ old('comment') }}" required/>
                        <select class="form-control mb-2" placeholder=@lang('admin.reviews.technique') name="technique" value="{{ old('technique') }}" required>
                            @foreach ($viewData['techniques'] as $technique)
                            <option value="{{ $technique->getId() }}">{{ $technique->getName() }}</option>
                            @endforeach
                        </select>
                        <p></p>
                        <div class="text-center">
                            <input type="submit" class="btn btn-danger" value=@lang('admin.reviews.add') required/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection