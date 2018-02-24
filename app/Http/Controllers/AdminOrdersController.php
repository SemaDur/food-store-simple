<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Product;
Use App\Mail\OrderDelete;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;

class AdminOrdersController extends Controller
{
    public function index() {

        $trashed = Product::onlyTrashed()->get();
        $orders = Order::all()->sortBy('status');


        return view('myview.adminOrders', compact('trashed', "orders"));
    }

    public function update($id)
    {
        Order::find($id)->update(['status'=>'completed']);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        $order->delete();

        \Mail::to($user)->send(new OrderDelete($user));

        return redirect()->route('orders.index');
    }
}
