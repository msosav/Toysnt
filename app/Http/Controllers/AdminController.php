<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('titles.home');
        $viewData['auth_user'] = auth()->user();

        return view('admin.index')->with('viewData', $viewData);
    }
}
