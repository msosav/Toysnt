<div class="mx-5">
    <input class="form-control" type="search" placeholder="@lang('app.search.search')" aria-label="Search" wire:model.live="search">
    <div @if (count($viewData['toys'])==0 and count($viewData['techniques'])==0) class="dropdown-menu d-none" @else class="dropdown-menu d-block" @endif>
        @foreach($viewData['toys'] as $toy)
        <a class="dropdown-item" href="{{ route('toy.show', ['id'=> $toy->getId()]) }}">{{ $toy->getName() }}</a>
        @endforeach
        @foreach($viewData['techniques'] as $technique)
        <a class="dropdown-item" href="{{ route('technique.show', ['id'=> $technique->getId()]) }}">{{ $technique->getName() }}</a>
        @endforeach
    </div>
</div>