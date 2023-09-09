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

    
}