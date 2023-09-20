@extends('layouts.admin')
@section('title', $viewData['title'])
@section('profileName', $viewData['auth_user']->getName())
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('admin.techniques.edit'): {{ $viewData['technique']->getModel() }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('admin.technique.update', ['id' => $viewData['technique']->getId()]) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="@lang('admin.techniques.model')" name="model" value="{{ $viewData['technique']->getModel() }}" />
                        <input type="file" name="technique_image" accept=".jpg,.png,.jpeg" class="form-control mb-2" />
                        <input type="text" class="form-control mb-2" placeholder="@lang('admin.techniques.description')" name="description" value="{{ $viewData['technique']->getDescription() }}" />
                        <input type="number" class="form-control mb-2" placeholder="@lang('admin.techniques.price')" name="price" value="{{ $viewData['technique']->getPrice() }}" />
                        <p></p>
                        <div class="text-center">
                            <input type="submit" class="btn btn-danger" value=@lang('admin.techniques.edit') />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection