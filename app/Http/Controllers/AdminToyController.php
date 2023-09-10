<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Toy;

class AdminToyController extends Controller {
    public function index() : View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.toys.index');
        $viewData['toys'] = Toy::all();

        return view('admin.toy.index')->with('viewData', $viewData);
    }

    public function show(string $id): View 
    {
        if (Toy::find($id) === null) {
            return redirect()->route('admin.toy.index');
        } else {
            $viewData = [];
            $viewData['toy'] = Toy::find($id);
            $viewData['title'] = $viewData['toy']->getModel();

            return view('admin.toy.show')->with('viewData', $viewData);
        }
    }
}