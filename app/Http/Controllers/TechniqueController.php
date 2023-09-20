<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Technique;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TechniqueController extends Controller
{
    public function index(): View
    {
        $techniques = Technique::all();
        $viewData = [];
        $viewData['title'] = trans('app.titles.home');
        $viewData['selected'] = 'techniques';
        $viewData['techniques'] = $techniques;

        $reviews = [];
        foreach($techniques as $technique){
            $reviews[$technique->getModel()] = count($technique->getReviews());
        }
        arsort($reviews);
        $viewData['stats'] = $reviews;

        return view('technique.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $technique = Technique::find($id);

        if ($technique === null) {
            return redirect()->route('technique.index');
        } else {
            $viewData = [];
            $viewData['technique'] = $technique;
            $viewData['title'] = $viewData['technique']->getModel();
            $viewData['reviews'] = $viewData['technique']->reviews()->get();
            $viewData['reviewCount'] = $viewData['reviews']->count();

            return view('technique.show')->with('viewData', $viewData);
        }
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
