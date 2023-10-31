<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use App\Models\Toy;
use App\Models\Technique;
use Illuminate\View\View;

use function Termwind\render;

class Cart extends Component
{
    protected $listeners = [
        'updateCartQuantity' => 'handleUpdateCartQuantity',
    ];

    public function render(): View
    {
        $viewData = [];

        $cartToyData = session()->get('toys_in_cart');
        $cartTechniqueData = session()->get('techniques_in_cart');

        if ($cartToyData != null) {
            $toysInCart = [];
            $toysInCart = Toy::findMany(array_keys($cartToyData));
            $viewData['toysInCart'] = $toysInCart;
        }

        if ($cartTechniqueData != null) {
            $techniquesInCart = [];
            $techniquesInCart = Technique::findMany(array_keys($cartTechniqueData));
            $viewData['techniquesInCart'] = $techniquesInCart;
        }

        return view('livewire.cart.cart')->with('viewData', $viewData);
    }

    public function remove(): void
    {
        session()->forget('toys_in_cart');
        session()->forget('techniques_in_cart');
    }
}
