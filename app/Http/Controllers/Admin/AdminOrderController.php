<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.orders.index');
        $viewData['orders'] = Order::all();
        $viewData['auth_user'] = auth()->user();

        return view('admin.order.index')->with('viewData', $viewData);
    }
}
