<?php

namespace App\Http\Controllers;
use App\Models\Toy;

class ToyController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = trans('titles.home');
        $viewData['toys'] = Toy::all();

        return view('toy.index')->with('viewData', $viewData);
    }

    public function show(string $id)
    {

        return view('toys.show');
    }
}
