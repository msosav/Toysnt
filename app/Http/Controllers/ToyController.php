<?php

namespace App\Http\Controllers;

use App\Models\Toy;
use Illuminate\Http\RedirectResponse;
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
}
