<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Technique;
use Illuminate\View\View;

class TechniqueController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('titles.home');
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
}
