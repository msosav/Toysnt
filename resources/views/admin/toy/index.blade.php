@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="d-flex flex-row py3 justify-content-between">
    <h1 class="title">@lang('admin.toys.index')</h1>
    <div class="my-2">
        <a href="{{ route('admin.toy.create') }}" class="btn btn-outline">@lang('admin.toys.create')</a>
    </div>
</div>
<div class="row d-flex justify-content-center py-2 px-2">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @elseif (session('deleted'))
    <div class="alert alert-danger" role="alert">
        {{ session('deleted') }}
    </div>
    @endif
        @foreach ($viewData['toys'] as $toy)
        <div class="card-body p-2">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <div class="col-4">
                            <h5 class="card-title">{{ $toy->getModel() }}</h5>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('admin.toy.show', ['id'=> $toy['id']]) }}" id="admin-show"><i class="fa-solid fa-eye"></i> @lang('admin.toys.show')</a>
                                <a href="{{ route('admin.toy.edit', ['id'=> $toy['id']]) }}" id="admin-edit"><i class="fa-solid fa-pen"></i> @lang('admin.toys.edit')</a>
                                <a href="" id="admin-delete"><i class="fa-solid fa-trash"></i> @lang('admin.toys.delete')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
</div>
@endsection