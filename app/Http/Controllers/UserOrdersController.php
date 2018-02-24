<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Events\onAddOrderEvent;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class UserOrdersController extends Controller
{
    public function execute() {

        $cart = Cart::all()->where('user_id', Auth::user()->id);

        if(empty($cart->first())) {
            return view('myview.cart', ['cart' => null]);
        }

        $amount = 0;
        foreach($cart as $item) {
            $amount += $item->product->price;
        }


        $order = Order::create([
            'user_id' => Auth::user()->id,
            'amount' => $amount
        ]);

        foreach($cart as $item) {

            $order->products()->attach($item->product->id);

            $item->delete();

            $products[] = $item->product->id;
        }


        Event::fire(new onAddOrderEvent($products));

        $message['success'] = 'Uspjesno ste narucili! ';
        return redirect()->back()->with($message);
    }
}
