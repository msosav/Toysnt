@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
@forelse ($viewData['orders'] as $order)
<div class="card mb-4">
    <div class="card-header">
        @lang('app.orders.order') #{{ $order->getId() }}
    </div>
    <div class="card-body">
        <b>@lang('app.orders.date'):</b> {{ $order->getCreatedAt() }}<br />
        <b>@lang('app.orders.total'):</b> ${{ $order->getTotal() }}<br />
        <table class="table table-bordered table-striped text-center mt-3">
            <thead>
                <tr>
                    <th scope="col">@lang('app.orders.item')</th>
                    <th scope="col">@lang('app.orders.price')</th>
                    <th scope="col">@lang('app.orders.quantity')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->getItems() as $item)
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
    </div>
</div>
@empty
<div class="text-center">
    <h1 class="title">@lang('app.orders.no_orders')</h1>
    <a href="{{ route('toy.index') }}" class="btn btn-outline mt-2 mb-4">@lang('app.orders.toys')</a>
    <a href="{{ route('technique.index') }}" class="btn btn-outline mt-2 mb-4">@lang('app.orders.techniques')</a>
</div>
@endforelse
@endsection