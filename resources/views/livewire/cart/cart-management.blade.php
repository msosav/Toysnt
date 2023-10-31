<div>
    @if (isset($viewData['quantity']))
    <div class="text-center">
        <div class="input-group w-auto justify-content-center align-items-center py-4">
            <input type="button" value="-" class="button-minus border rounded-circle icon-shape icon-sm mx-1" wire:click="decrementQuantity">
            @if ($viewData['type'] == 'toy')
            <input type="number" value="{{ $viewData['quantity'] }}" max="{{ $viewData['stock'] }}" name="quantity" class="quantity-field border-0 text-center w-25">
            @else
            <input type="number" value="{{ $viewData['quantity'] }}" name="quantity" class="quantity-field border-0 text-center w-25">
            @endif
            <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " wire:click="incrementQuantity">
        </div>
    </div>
    @else
    <div class="text-center">
        <div class="col-auto py-4">
            <button class="btn bg-primary text-white" wire:click="add('{{ $viewData['type'] }} {{ $viewData['id'] }}')">@lang('app.cart.add')</button>
        </div>
    </div>
    @endif
</div>