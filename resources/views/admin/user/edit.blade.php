@extends('layouts.admin')
@section('title', $viewData['title'])
@section('profileName', $viewData['auth_user']->getName())
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('admin.users.edit'): {{ $viewData['user']->getName() }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('admin.user.update', ['id' => $viewData['user']->getId()]) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder=@lang('admin.users.name') name="name" value="{{ $viewData['user']->getName() }}" required />
                        <input type="text" class="form-control mb-2" placeholder=@lang('admin.users.email') name="email" value="{{ $viewData['user']->getEmail() }}" required />
                        <input type="password" class="form-control mb-2" placeholder=@lang('admin.users.password') name="password" value="{{ $viewData['user']->getPassword() }}" required />
                        <select type="text" class="form-select mb-2" name="role" required>
                            @if($viewData['user']->getRole() == 'basic_user')
                            <option selected value="basic_user">@lang('admin.users.basic_user')</option>
                            <option value="admin">@lang('admin.users.admin')</option>
                            @elseif($viewData['user']->getRole() == 'admin')
                            <option value="basic_user">@lang('admin.users.basic_user')</option>
                            <option selected value="admin">@lang('admin.users.admin')</option>
                            @endif
                        </select>
                        <input type="number" class="form-control mb-2" placeholder=@lang('admin.users.balance') name="balance" value="{{ $viewData['user']->getBalance() }}" required />
                        <input type="address" class="form-control mb-2" placeholder=@lang('admin.users.address') name="address" value="{{ $viewData['user']->getAddress() }}" required />
                        <p></p>
                        <div class="text-center">
                            <input type="submit" class="btn btn-danger" value=@lang('admin.users.edit') />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection