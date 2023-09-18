<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Technique;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TechniqueController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('app.titles.home');
        $viewData['selected'] = 'techniques';
        $viewData['techniques'] = Technique::all();

        return view('technique.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $technique = Technique::findOrFail($id);
        $viewData = [];
        $viewData['title'] = $technique->getModel();
        $viewData['technique'] = $technique;
        $viewData['selected'] = 'techniques';
        $viewData['reviews'] = Review::all()->where('technique_id', $id);

        return view('technique.show')->with('viewData', $viewData);
    }

    public function search(Request $request): RedirectResponse
    {
        $search = $request->input('search');

        if ($search == null) {
            return redirect()->route('technique.index');
        }

        return redirect()->route('technique.results', ['model' => $search]);
    }

    public function results(string $model): View|RedirectResponse
    {
        if ($model == null) {
            return redirect()->route('technique.index');
        }

        $techniques = Technique::query()
            ->where('model', 'LIKE', "%{$model}%")
            ->get();

        $viewData = [];
        if ($techniques->isEmpty()) {
            $viewData['techniques'] = null;
        } else {
            $viewData['techniques'] = $techniques;
        }
        $viewData['search'] = $model;
        $viewData['title'] = $model;

        return view('technique.results')->with('viewData', $viewData);
    }
}
