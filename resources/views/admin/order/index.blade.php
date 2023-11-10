@extends('layouts.admin')
@section('title', $viewData['title'])
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
                    <div class="col-4">
                        <h5 class="card-title">@lang('app.orders.order') #{{ $order->getId() }}</h5>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around">
                            <a href="" id="admin-show"><i class="fa-solid fa-eye"></i> @lang('admin.toys.show')</a>
                            <a href="" id="admin-edit"><i class="fa-solid fa-pen"></i> @lang('admin.toys.edit')</a>
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