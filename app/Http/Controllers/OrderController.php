<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Toy;
use App\Models\Technique;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function purchase(Request $request): RedirectResponse
    {
        if($request->toys == null){
            return redirect()->route('toy.index')->with('add_some_toys', trans('app.cart.add_some_toys'));; 
        }
        if($request->session()->get('cart_toy_data') != [])
        {
            $order = new Order();
            $order->setTotal(0);
            $order->setUserId(auth()->user()->id);
            $order->setAddress(auth()->user()->address);
            $order->save();

            $toys = explode('},',$request->toys);
            if(count($toys)>1){
                $toys[0] = $toys[0].'}';
            }
            $techniques = explode('},',$request->techniques);
            if(count($techniques)>1){
                $techniques[0] = $techniques[0].'}';
            }


            $total = 0;
            foreach($toys as $toy){
                $toy = json_decode($toy);
                $id = strval($toy->id);
                $quantity = $request->$id;
                $item = new Item();
                $toy = Toy::find($toy->id);
                $item->setQuantity($quantity);
                $item->setMethod($toy->getModel());
                $item->setPrice($toy->getPrice());
                $total += $toy->getPrice()*$quantity;
                $item->setOrderId($order->getId());
                $item->setToyId($toy->getId());
                $item->setTechniqueId(0);
                $item->save();
                $toy->setStock($toy->getStock()-$item->getQuantity());
                $toy->update();
            }
            if($request->techniques != null){
                foreach($techniques as $technique){
                    $technique = json_decode($technique);
                    $item = new Item();
                    $technique = Technique::find($technique->id);
                    $item->setQuantity('1');
                    $item->setMethod($technique->getModel());
                    $item->setPrice($technique->getPrice());
                    $total += $technique->getPrice();
                    $item->setOrderId($order->getId());
                    $item->setTechniqueId($technique->getId());
                    $item->setToyId(0);
                    $item->save();
                }
            }

            $order->setTotal($total);
            $order->update();

            $user = User::find(auth()->user()->id);
            $user->setBalance($user->getBalance()-$total);
            $user->update();

            $request->session()->forget('cart_toy_data');
            $request->session()->forget('cart_technique_data');

            return redirect()->route('toy.index')->with('purchase_successful', trans('app.cart.purchase_successful'));
        }
        else
        {
            return redirect()->route('toy.index')->with('purchase_failed', trans('app.cart.purchase_failed'));;
        }
    }
}