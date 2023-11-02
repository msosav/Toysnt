<?php

namespace App\Http\Controllers;

use App\Models\Technique;
use Illuminate\View\View;
use App\Models\Toy;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('app.home.home');
        $viewData['toys'] = Toy::stats();
        $viewData['techniques'] = Technique::stats();

        return view('home.index')->with('viewData', $viewData);
    }
}