@extends('layouts.admin')
@section('title', $viewData['title'])
@section('profileName', $viewData['auth_user']->getName())
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('admin.users.create')</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('admin.user.save') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder=@lang('admin.users.name') name="name" value="{{ old('name') }}" required />
                        <input type="text" class="form-control mb-2" placeholder=@lang('admin.users.email') name="email" value="{{ old('email') }}" required />
                        <input type="password" class="form-control mb-2" placeholder=@lang('admin.users.password') name="password" value="{{ old('password') }}" required />
                        <select type="text" class="form-select mb-2" name="role" required>
                            <option value="basic_user">@lang('admin.users.basic_user')</option>
                            <option value="admin">@lang('admin.users.admin')</option>
                        </select>
                        <input type="number" class="form-control mb-2" placeholder=@lang('admin.users.balance') name="balance" value="{{ old('balance') }}" required />
                        <input type="address" class="form-control mb-2" placeholder=@lang('admin.users.address') name="address" value="{{ old('address') }}" required />
                        <p></p>
                        <div class="text-center">
                            <input type="submit" class="btn btn-danger" value=@lang('admin.users.add') />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection