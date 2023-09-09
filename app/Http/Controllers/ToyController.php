<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Toy;

class ToyController extends Controller
{
    public function index() : View
    {
        $viewData = [];
        $viewData['title'] = trans('titles.home');
        $viewData['toys'] = Toy::all();

        return view('toy.index')->with('viewData', $viewData);
    }

    public function show(int $id): View|RedirectResponse
    {
        if (Toy::find($id) === null) {
            return redirect()->route('toy.index');
        } else {
            $viewData = [];
            $viewData['toy'] = Toy::find($id);
            $viewData['title'] = 'Toys';
            return view('toy.show')->with('viewData', $viewData);
        }
    }
}
