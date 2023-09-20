@extends('layouts.admin')
@section('title', $viewData['title'])
@section('profileName', $viewData['auth_user']->getName())
@section('content')
<div class="d-flex flex-row py3 justify-content-between">
    <h1 class="title">@lang('admin.orders.index')</h1>
</div>
<div class="row d-flex justify-content-center py-2 px-2">
    @foreach ($viewData['orders'] as $order)
    <div class="card-body p-2">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-between">
                    <div class="col-5">
                        <h5 class="card-title">{{ $order->getUser()->getName() }}</h5>
                    <div class="col-5">
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('admin.order.show', ['id'=> $order['id']]) }}" id="admin-show"><i class="fa-solid fa-eye"></i> @lang('admin.orders.show')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection