@extends('layouts.admin')
@section('title', $viewData['title'])
@section('profileName', $viewData['auth_user']->getName())
@section('content')
<div class="d-flex flex-row py3 justify-content-between">
    <h1 class="title">@lang('admin.users.index')</h1>
    <div class="my-2">
        <a href="{{ route('admin.user.create') }}" class="btn btn-outline">@lang('admin.users.create')</a>
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
    @foreach ($viewData['users'] as $user)
    <div class="card-body p-2">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-between">
                    <div class="col-4">
                        <h5 class="card-title">{{ $user->getName() }}</h5>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('admin.user.show', ['id'=> $user['id']]) }}" id="admin-show"><i class="fa-solid fa-eye"></i> @lang('admin.users.show')</a>
                            <a href="{{ route('admin.user.edit', ['id'=> $user['id']]) }}" id="admin-edit"><i class="fa-solid fa-pen"></i> @lang('admin.users.edit')</a>
                            <a href="{{ route('admin.user.delete', ['id'=> $user['id']]) }}" id="admin-delete"><i class="fa-solid fa-trash"></i> @lang('admin.users.delete')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection