@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="row">
    @livewire('search.search')
</div>
@endsection