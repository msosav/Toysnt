<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PurchaseController extends Controller
{
    public function purchase(array $toys, array $techniques): View
    {
        
    }

    public function confirmPurchase(string $id): View
    {
        $Item = Item::findOrFail($id);
        $viewData = [];
        $viewData['title'] = $Item->getModel();
        $viewData['Item'] = $Item;
        $viewData['selected'] = 'Items';
        $viewData['reviews'] = Review::all()->where('Item_id', $id);

        return view('Item.show')->with('viewData', $viewData);
    }

    public function search(Request $request): RedirectResponse
    {
        $search = $request->input('search');

        if ($search == null) {
            return redirect()->route('Item.index');
        }

        return redirect()->route('Item.results', ['model' => $search]);
    }

    public function results(string $model): View|RedirectResponse
    {
        if ($model == null) {
            return redirect()->route('Item.index');
        }

        $Items = Item::query()
            ->where('model', 'LIKE', "%{$model}%")
            ->get();

        $viewData = [];
        if ($Items->isEmpty()) {
            $viewData['Items'] = null;
        } else {
            $viewData['Items'] = $Items;
        }
        $viewData['search'] = $model;
        $viewData['title'] = $model;

        return view('Item.results')->with('viewData', $viewData);
    }
}
