@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container my-4">
    @livewire('cart.cart')
</div>
@endsection