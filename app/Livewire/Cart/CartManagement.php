<?php

namespace App\Livewire\Cart;

use App\Models\Toy;
use Illuminate\View\View;
use Livewire\Component;

class CartManagement extends Component
{
    public $type;

    public $id;

    public function mount($type, $id): void
    {
        $this->type = $type;
        $this->id = $id;
    }

    public function render(): View
    {
        $viewData = [];

        if ($this->type == 'toy') {
            $viewData['id'] = $this->id;
            $viewData['type'] = $this->type;
            $viewData['quantity'] = 0;
            $cartData = session()->get('toys_in_cart');
            if (isset($cartData[$this->id])) {
                $viewData['quantity'] = $cartData[$this->id];
                $toy = Toy::find($this->id);
                $viewData['stock'] = $toy->getStock();

                if ($viewData['quantity'] > $viewData['stock']) {
                    $viewData['quantity'] = $viewData['stock'];
                }
            }
            $this->dispatch('updateCartQuantity', $viewData['id'], $viewData['type'], $viewData['quantity']);

            return view('livewire.cart.cart-management', ['viewData' => $viewData]);
        } else {
            $viewData['id'] = $this->id;
            $viewData['type'] = $this->type;
            $viewData['quantity'] = 0;
            $cartData = session()->get('techniques_in_cart');
            if (isset($cartData[$this->id])) {
                $viewData['quantity'] = $cartData[$this->id];
            }
            $this->dispatch('updateCartQuantity', $viewData['id'], $viewData['type'], $viewData['quantity']);

            return view('livewire.cart.cart-management')->with('viewData', $viewData, 'product_in_cart');
        }
    }

    public function add(): void
    {
        if ($this->type == 'toy') {
            $cartToyData = session()->get('toys_in_cart');
            if (! $cartToyData) {
                $cartToyData = [
                    $this->id => 1,
                ];
                session()->put('toys_in_cart', $cartToyData);
            } else {
                if (isset($cartToyData[$this->id])) {
                    $cartToyData[$this->id] += 1;
                } else {
                    $cartToyData[$this->id] = 1;
                }
                session()->put('toys_in_cart', $cartToyData);
            }
        } else {
            $cartTechniqueData = session()->get('techniques_in_cart');
            if (! $cartTechniqueData) {
                $cartTechniqueData = [
                    $this->id => 1,
                ];
                session()->put('techniques_in_cart', $cartTechniqueData);
            } else {
                if (isset($cartTechniqueData[$this->id])) {
                    $cartTechniqueData[$this->id] += 1;
                } else {
                    $cartTechniqueData[$this->id] = 1;
                }
                session()->put('techniques_in_cart', $cartTechniqueData);
            }
        }
    }

    public function incrementQuantity(): void
    {
        if ($this->type == 'toy') {
            $toy = Toy::find($this->id);
            $cartToyData = session()->get('toys_in_cart');
            if ($cartToyData[$this->id] == $toy->getStock()) {
                return;
            } else {
                $cartToyData[$this->id] += 1;
                session()->put('toys_in_cart', $cartToyData);
            }
        } else {
            $cartTechniqueData = session()->get('techniques_in_cart');
            $cartTechniqueData[$this->id] += 1;
            session()->put('techniques_in_cart', $cartTechniqueData);
        }
    }

    public function decrementQuantity(): void
    {
        if ($this->type == 'toy') {
            $cartToyData = session()->get('toys_in_cart');
            $cartToyData[$this->id] -= 1;
            if ($cartToyData[$this->id] == 0) {
                unset($cartToyData[$this->id]);
            }
            session()->put('toys_in_cart', $cartToyData);
        } else {
            $cartTechniqueData = session()->get('techniques_in_cart');
            $cartTechniqueData[$this->id] -= 1;
            if ($cartTechniqueData[$this->id] == 0) {
                unset($cartTechniqueData[$this->id]);
            }
            session()->put('techniques_in_cart', $cartTechniqueData);
        }
    }
}
