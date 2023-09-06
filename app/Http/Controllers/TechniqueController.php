<?php

namespace App\Http\Controllers;

use App\Models\Technique;
use App\Models\Review;
use Illuminate\View\View;

class TechniqueController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('titles.home');
        $viewData['selected'] = 'techniques';
        $viewData['technique'] = Technique::all($columns = ['*']);

        return view('technique.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $technique = Technique::findOrFail($id);
        $viewData = [];
        $viewData['title'] = $technique->getModel();
        $viewData['technique'] = $technique;
        $viewData['selected'] = 'techniques';
        $viewData['review'] = Review::all()->where('technique_id', $id);

        return view('technique.show')->with('viewData', $viewData);
    }
}
