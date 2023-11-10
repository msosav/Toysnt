<?php

namespace App\Livewire\Cart;

use App\Models\Technique;
use App\Models\Toy;
use Illuminate\View\View;
use Livewire\Component;

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

    public function remove(string $type, string $id = null): void
    {
        if ($type == 'toy') {
            $cartToyData = session()->get('toys_in_cart');
            unset($cartToyData[$id]);
            session()->put('toys_in_cart', $cartToyData);
        } elseif ($type == 'technique') {
            $cartTechniqueData = session()->get('techniques_in_cart');
            unset($cartTechniqueData[$id]);
            session()->put('techniques_in_cart', $cartTechniqueData);
        } elseif ($type == 'all') {
            session()->forget('toys_in_cart');
            session()->forget('techniques_in_cart');
        }
    }
}
