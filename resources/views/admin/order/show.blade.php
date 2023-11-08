@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
@include('layouts.alerts')
<div class="card-body">
    <b>@lang('app.orders.date'):</b> {{ $viewData['order']->getCreatedAt() }}<br />
    <b>@lang('app.orders.total'):</b> ${{ $viewData['order']->getTotal() }}<br />
    <table class="table table-bordered table-striped text-center mt-3">
        <thead>
            <tr>
                <th scope="col">@lang('app.orders.item')</th>
                <th scope="col">@lang('app.orders.price')</th>
                <th scope="col">@lang('app.orders.quantity')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viewData['order']->getItems() as $item)
            <tr>
                <td>
                    @if ($item->getToyId())
                    <a class="link-success" href="{{ route('toy.show', ['id'=> $item->getToyId()]) }}">
                        {{ $item->getName() }}
                    </a>
                    @else
                    <a class="link-success" href="{{ route('technique.show', ['id'=> $item->getTechniqueId()]) }}">
                        {{ $item->getName() }}
                    </a>
                    @endif
                </td>
                <td>${{ $item->getPrice() }}</td>
                <td>{{ $item->getQuantity() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="sub_div py-2 flex justify-content-around">
        <a href="{{ route('admin.order.edit', ['id' => $viewData['order']->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-pen"></i> @lang('admin.order.edit')</a>
        <a href="{{ route('admin.order.delete', ['id' => $viewData['order']->getId()]) }}" class="btn btn-outline"><i class="fa-solid fa-trash"></i> @lang('admin.order.delete')</a>
    </div>

</div>
@endsection