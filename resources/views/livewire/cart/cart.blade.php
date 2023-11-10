<div>
    <div class="container">
        @include('layouts.alerts')
        @if (!isset($viewData['toysInCart']) && !isset($viewData['techniquesInCart']))
        <div class="text-center">
            <h1 class="title">@lang('app.cart.empty')</h1>
            <a href="{{ route('toy.index') }}" class="btn btn-outline mt-2 mb-4">@lang('app.cart.toys')</a>
            <a href="{{ route('technique.index') }}" class="btn btn-outline mt-2 mb-4">@lang('app.cart.techniques')</a>
        </div>
        @else
        <div class="row">
            <h1 class="title">@lang('app.cart.cart')</h1>
            <div class='row'>
                <div class='col-3'>
                    <a wire:click="remove('all')" class="btn btn-outline mt-2 mb-4">@lang('app.cart.empty')</a>
                </div>
                <div class='col-3 mt-2'>
                    <a href="{{ route('order.purchase') }}" type="button" class="btn btn-outline"><i class="fa-solid fa-money-bill"></i> @lang('app.cart.pay')</a>
                </div>
            </div>
        </div>
        <div class="card-group">
            @if (isset($viewData['toysInCart']))
            @foreach ($viewData['toysInCart'] as $toy)
            <div class="col-md-4 col-lg-3 mb-2 mt-1" wire:key="{{'toy' . $toy->getId()}}">
                <div class="card index-card h-100">
                    <img src="{{ URL::asset('storage/'.$toy->getImage()) }}" class="card-img-top index-image" alt="{{ $toy->getName() }}">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col d-block">
                                <h5 class="card-title"><a href="{{ route('toy.show', ['id'=> $toy->getId()]) }}" id="card-title">{{ $toy->getName() }}</a></h5>
                                <h6 class="card-subtitle" id="card-price">${{ $toy->getPrice() }}</h6>
                            </div>
                            <div class="text-center">
                                <div class="col">
                                    @livewire('cart.cart-management', ['type' => 'toy', 'id' => $toy->getId()], key('toy' . $toy->getId()))
                                    <a wire:click="remove('toy', {{ $toy->getId() }})" class="btn btn-outline"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            @if (isset($viewData['techniquesInCart']))
            @foreach ($viewData['techniquesInCart'] as $technique)
            <div class="col-4 d-flex justify-content-start">
                <div class="card me-2 mb-4" style="width: 18rem;">
                    <img src="{{ URL::asset('storage/'.$technique->getImage()) }}" class="card-img-top" alt="{{ $technique->getName() }}" id="index-card-image">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-block">
                                <h5 class="card-title"><a href="{{ route('technique.show', ['id'=> $technique->getId()]) }}" id="card-title">{{ $technique->getName() }}</a></h5>
                                <h6 class="card-subtitle" id="card-price">${{ $technique->getPrice() }}</h6>
                            </div>
                            <div class="d-flex col justify-content-end mt-2">
                                <a wire:click="remove('technique', {{ $technique->getId() }})" class="btn btn-outline"><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                            @livewire('cart.cart-management', ['type' => 'technique', 'id' => $technique->getId(), key('technique', $technique->getId())])
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        @endif
    </div>
</div>