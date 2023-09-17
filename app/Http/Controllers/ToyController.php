<?php

namespace App\Http\Controllers;

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

            return view('toy.show')->with('viewData', $viewData);
        }
    }

    public function find(Request $request): View
    {
        $search = $request->input('search');

        if ($search == null) {
            return redirect()->route('toy.index');
        }

        $toys = Toy::query()
            ->where('model', 'LIKE', "%{$search}%")
            ->get();

        $viewData = [];
        $viewData['toys'] = $toys;
        $viewData['search'] = $search;
        $viewData['title'] = $search;

        return view('toy.results')->with('viewData', $viewData);
    }

    public function search(string $model): View
    {
        if ($model == null) {
            return redirect()->route('toy.index');
        }

        $toys = Toy::query()
            ->where('model', 'LIKE', "%{$model}%")
            ->get();

        $viewData = [];
        $viewData['toys'] = $toys;
        $viewData['search'] = $model;
        
        return view('toy.search')->with('viewData', $viewData);
    }
}
