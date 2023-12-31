<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Technique;
use App\Models\Toy;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        $orders = $orders->sortByDesc('created_at');
        $viewData = [];
        $viewData['title'] = trans('app.orders.my_orders');
        $viewData['orders'] = $orders;

        return view('order.index')->with('viewData', $viewData);
    }

    public function purchase(Request $request): RedirectResponse
    {
        $toysInSession = $request->session()->get('toys_in_cart');
        $techniquesInSession = $request->session()->get('techniques_in_cart');

        if ($toysInSession) {
            $userId = auth()->user()->id;
            $userAddress = auth()->user()->address;
            $order = new Order();
            $order->setTotal(0);
            $order->setUserId($userId);
            $order->setAddress($userAddress);
            $order->save();

            $total = 0;
            $toysInCart = Toy::findMany(array_keys($toysInSession));
            foreach ($toysInCart as $toy) {
                $quantity = $toysInSession[$toy->getId()];

                if ($quantity > $toy->getStock()) {
                    $message = trans('app.cart.stock_changed').$toy->getName().'-'.$toy->getStock().trans('app.cart.stock_changed_units');
                    $toysInSession[$toy->getId()] = $toy->getStock();
                    $request->session()->put('toys_in_cart', $toysInSession);

                    return back()->with('stock_changed', $message);
                }
            }
            foreach ($toysInCart as $toy) {
                $quantity = $toysInSession[$toy->getId()];

                $item = new Item();
                $item->setQuantity($quantity);
                $item->setName($toy->getName());
                $item->setPrice($toy->getPrice());
                $item->setOrderId($order->getId());
                $item->setToyId($toy->getId());
                $item->save();

                $toy->setStock($toy->getStock() - $quantity);
                $toy->save();

                $total += $toy->getPrice() * $quantity;
            }

            if ($techniquesInSession) {
                $techniquesInCart = Technique::findMany(array_keys($techniquesInSession));
                foreach ($techniquesInCart as $technique) {
                    $quantity = $techniquesInSession[$technique->getId()];

                    if ($quantity > $toy->getStock()) {
                        return back()->with('stock_changed', trans('app.cart.stock_changed'));
                    }

                    $item = new Item();
                    $item->setQuantity($quantity);
                    $item->setName($technique->getName());
                    $item->setPrice($technique->getPrice());
                    $item->setOrderId($order->getId());
                    $item->setTechniqueId($technique->getId());
                    $item->save();

                    $total += $technique->getPrice() * $quantity;
                }
            }

            $order->setTotal($total);
            $order->save();

            $user = User::find(auth()->user()->id);
            $user->setBalance($user->getBalance() - $total);
            $user->save();

            $request->session()->forget('toys_in_cart');
            $request->session()->forget('techniques_in_cart');

            return redirect()->route('toy.index')->with('purchase_successful', trans('app.cart.purchase_successful'));
        } else {
            return redirect()->route('toy.index')->with('purchase_failed', trans('app.cart.purchase_failed'));
        }
    }
}
