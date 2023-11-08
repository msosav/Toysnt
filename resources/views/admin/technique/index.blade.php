@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="d-flex flex-row py3 justify-content-between">
    <h1 class="title">@lang('admin.techniques.index')</h1>
    <div class="my-2">
        <a href="{{ route('admin.technique.create') }}" class="btn btn-outline">@lang('admin.techniques.create')</a>
    </div>
</div>
<div class="row d-flex justify-content-center py-2 px-2">
    @include('layouts.alerts')
    @foreach ($viewData['techniques'] as $technique)
    <div class="card-body p-2">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-between">
                    <div class="col-4">
                        <h5 class="card-title">{{ $technique->getName() }}</h5>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('admin.technique.show', ['id'=> $technique['id']]) }}" id="admin-show"><i class="fa-solid fa-eye"></i> @lang('admin.techniques.show')</a>
                            <a href="{{ route('admin.technique.edit', ['id'=> $technique['id']]) }}" id="admin-edit"><i class="fa-solid fa-pen"></i> @lang('admin.techniques.edit')</a>
                            <a href="{{ route('admin.technique.delete', ['id'=> $technique['id']]) }}" id="admin-delete"><i class="fa-solid fa-trash"></i> @lang('admin.techniques.delete')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection