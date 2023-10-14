<?php

namespace App\Http\Controllers;

use App\Models\Technique;
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
        $cartToyData = $request->session()->get('toys_in_cart');

        $techniques = Technique::all();
        $cartTechniques = [];
        $cartTechniqueData = $request->session()->get('techniques_in_cart');

        if ($cartToyData) {
            foreach ($toys as $toy) {
                if (in_array($toy->getId(), array_keys($cartToyData))) {
                    $cartToys[$toy->getId()] = $toy;
                }
            }
        }

        if ($cartTechniqueData) {
            foreach ($techniques as $technique) {
                if (in_array($technique->getId(), array_keys($cartTechniqueData))) {
                    $cartTechniques[$technique->getId()] = $technique;
                }
            }
        }

        $viewData = [];
        $viewData['title'] = 'Cart - Online Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['cartToys'] = $cartToys;
        $viewData['cartTechniques'] = $cartTechniques;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, string $type, string $id): RedirectResponse
    {
        if ($type == 'toy') {
            $cartToyData = $request->session()->get('toys_in_cart');
            if (isset($cartToyData[$id])) {
                return back()->with('already_added', trans('app.cart.toy_already_added'));
            } else {
                $cartToyData[$id] = $request->input('quantity');
                $request->session()->put('toys_in_cart', $cartToyData);

                return back()->with('added', trans('app.cart.toy_added'));
            }
        } elseif ($type == 'technique') {
            $cartTechniqueData = $request->session()->get('techniques_in_cart');
            if (isset($cartTechniqueData[$id])) {
                return back()->with('already_added', trans('app.cart.technique_already_added'));
            } else {
                $cartTechniqueData[$id] = $request->input('quantity');
                $request->session()->put('techniques_in_cart', $cartTechniqueData);

                return back()->with('added', trans('app.cart.technique_added'));
            }
        } else {
            return redirect()->route('toy.index');
        }
    }

    public function remove(Request $request, string $type, string $id): RedirectResponse
    {
        if ($type == 'toy') {
            $cartToyData = $request->session()->get('toys_in_cart');
            unset($cartToyData[$id]);
            $request->session()->put('toys_in_cart', $cartToyData);

            return back()->with('removed', trans('app.cart.toy_removed'));
        } elseif ($type == 'technique') {
            $cartTechniqueData = $request->session()->get('techniques_in_cart');
            unset($cartTechniqueData[$id]);
            $request->session()->put('techniques_in_cart', $cartTechniqueData);

            return back()->with('removed', trans('app.cart.technique_removed'));
        } elseif ($type == 'all') {
            if ($request->session()->get('toys_in_cart') == [] and $request->session()->get('techniques_in_cart') == []) {
                return back()->with('already_removed', trans('app.cart.already_removed'));
            } else {
                $request->session()->forget('toys_in_cart');
                $request->session()->forget('techniques_in_cart');

                return back()->with('cart_emptied', trans('app.cart.cart_emptied'));
            }
        }
    }
}
