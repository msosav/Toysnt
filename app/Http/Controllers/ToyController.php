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

        return view('toy.results')->with('viewData', $viewData);
    }
}
