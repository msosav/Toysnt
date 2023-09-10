@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('admin.toys.create')</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('admin.toy.save') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder=@lang('admin.toys.model') name="model" value="{{ old('model') }}" />
                        <input type="file" name="toy_image" accept=".jpg,.png,.jpeg" class="form-control mb-2" placeholder=@lang('admin.toys.image') />
                        <input type="text" class="form-control mb-2" placeholder=@lang('admin.toys.description') name="description" value="{{ old('description') }}" />
                        <input type="number" class="form-control mb-2" placeholder=@lang('admin.toys.price') name="price" value="{{ old('price') }}" />
                        <input type="number" class="form-control mb-2" placeholder=@lang('admin.toys.stock') name="stock" value="{{ old('stock') }}" />
                        <p></p>
                        <div class="text-center">
                            <input type="submit" class="btn btn-danger" value=@lang('admin.toys.add') />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection