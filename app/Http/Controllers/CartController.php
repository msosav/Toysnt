<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('app.cart.cart');

        return view('cart.index')->with('viewData', $viewData);
    }
}
