<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Order;
use App\Models\User;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.orders.index');
        $viewData['orders'] = Order::all();

        return view('admin.order.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $order = Order::find($id);
        $user = User::find($order->getUserId());

        if ($order === null) {
            return redirect()->route('admin.toy.index');
        } else {
            $viewData = [];
            $viewData['order'] = $order;
            $viewData['title'] = $viewData['order']->getId();
            $viewData['user'] = $user;

            return view('admin.order.show')->with('viewData', $viewData);
        }
    }

    public function delete(string $id): RedirectResponse
    {
        $order = Order::find($id);

        if ($order !== null) {
            $order->delete();
        }

        return redirect()->route('admin.order.index')->with('deleted', trans('admin.orders.deleted'));
    }
}
