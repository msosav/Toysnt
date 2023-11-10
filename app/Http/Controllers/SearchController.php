<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Search';

        return view('search.index')->with('viewData', $viewData);
    }
}
