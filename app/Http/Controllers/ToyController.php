<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Toy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ToyController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('app.titles.home');
        $viewData['toys'] = Toy::all();
        $viewData['auth_user'] = auth()->user();

        $items = Item::all();
        $toyStats = [];
        foreach ($items as $item) {
            if ($item->getToyId() != null) {
                if (isset($toyStats[$item->getMethod()])) {
                    $toyStats[$item->getMethod()] += $item->getQuantity();
                } else {
                    $toyStats[$item->getMethod()] = $item->getQuantity();
                }
            }
        }
        arsort($toyStats);
        $viewData['stats'] = $toyStats;

        return view('toy.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $toy = Toy::find($id);

        if ($toy === null) {
            return redirect()->route('toy.index');
        } else {
            $viewData = [];
            $viewData['toy'] = $toy;
            $viewData['title'] = $viewData['toy']->getModel();
            $viewData['reviews'] = $viewData['toy']->reviews()->get();
            $viewData['reviewCount'] = $viewData['reviews']->count();
            $viewData['auth_user'] = auth()->user();

            return view('toy.show')->with('viewData', $viewData);
        }
    }

    public function search(Request $request): RedirectResponse
    {
        $search = $request->input('search');

        if ($search == null) {
            return redirect()->route('toy.index');
        }

        return redirect()->route('toy.results', ['model' => $search]);
    }

    public function results(string $model): View|RedirectResponse
    {
        if ($model == null) {
            return redirect()->route('toy.index');
        }

        $toys = Toy::query()
            ->where('model', 'LIKE', "%{$model}%")
            ->get();

        $viewData = [];
        if ($toys->isEmpty()) {
            $viewData['toys'] = null;
        } else {
            $viewData['toys'] = $toys;
        }
        $viewData['search'] = $model;
        $viewData['title'] = $model;
        $viewData['auth_user'] = auth()->user();

        return view('toy.results')->with('viewData', $viewData);
    }
}
