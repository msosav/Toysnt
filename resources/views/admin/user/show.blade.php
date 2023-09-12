@extends('layouts.admin')
@section('title', $viewData['title'])
@section('profileName', $viewData['auth_user']->getName())
@section('content')
@if (session('edited'))
<div class="alert alert-warning" role="alert">
    {{ session('edited') }}
</div>
@endif
<div class="card md-5 my-4 mx-4 card-padding">
    <div class="row g-3">
        <div class="col-md-5 my-5">
            <h1 id="show-title" class="py-1">{{ $viewData['user']->getName() }}</h1>
            <div class="class-body px-2 py-2 d-block">
                <p class="card-text"><b>@lang('admin.users.email'):</b> {{ $viewData['user']->getEmail() }}</p>
                <p class="card-text"><b>@lang('admin.users.password'):</b> {{ $viewData['user']->getPassword() }}</p>
                <p class="card-text"><b>@lang('admin.users.role'):</b> 
                    @if($viewData['user']->getRole() == 'basic_user')
                    @lang('admin.users.basic_user').
                    @elseif($viewData['user']->getRole() == 'admin')
                    @lang('admin.users.admin').
                    @endif
                </p>
                <p class="card-text"><b>@lang('admin.users.balance'):</b> {{ $viewData['user']->getBalance() }}.</p>
                <p class="card-text"><b>@lang('admin.users.address'):</b> {{ $viewData['user']->getAddress() }}.</p>
                <div class="sub_div py-2 flex justify-content-around mb-4">
                    <a href="{{ route('admin.user.edit', ['id' => $viewData['user']->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-pen"></i> @lang('admin.users.edit')</a>
                    <a href="{{ route('admin.user.delete', ['id' => $viewData['user']->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-trash"></i> @lang('admin.users.delete')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection