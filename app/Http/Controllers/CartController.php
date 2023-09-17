<?php

namespace App\Http\Controllers;

use App\Models\Toy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $toys = Toy::all();
        $cartToys = [];
        $cartToyData = $request->session()->get('cart_toy_data');

        if ($cartToyData) {
            foreach ($toys as $toy) {
                if (in_array($toy->getId(), array_keys($cartToyData))) {
                    $cartToys[$toy->getId()] = $toy;
                }
            }
        }

        $viewData = [];
        $viewData['title'] = 'Cart - Online Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['cartToys'] = $cartToys;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(string $id, Request $request): RedirectResponse
    {
        $cartToyData = $request->session()->get('cart_toy_data');
        $cartToyData[$id] = $id;
        $request->session()->put('cart_toy_data', $cartToyData);

        return back()->with('added', trans('app.cart.toy_added'));
    }

    public function remove(string $id, Request $request): RedirectResponse
    {
        $cartToyData = $request->session()->get('cart_toy_data');
        unset($cartToyData[$id]);
        $request->session()->put('cart_toy_data', $cartToyData);

        return back()->with('removed', trans('app.cart.toy_removed'));
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_toy_data');

        return back()->with('toys_removed', trans('app.cart.toys_removed'));
    }
}
