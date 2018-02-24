<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    public function index()
    {

        $cart = Cart::all()->where('user_id', Auth::user()->id);
        if(empty($cart->first())) {
            return view('myview.cart', ['cart' => null]);
        }

        $totalPrice = 0;
        foreach($cart as $item) {
            $totalPrice += $item->product->price;


            $word = explode(' ', $item->product->description);
            if ( count($word) > 10 ) {
                $short_description[$item->product->id] = implode(' ', array_slice($word, 0, 10)) . ' ...';
            } else {
                $short_description[$item->product->id] = implode(' ', $word);
            }
        }

        return view('myview.cart', compact('cart', 'totalPrice', 'short_description'));
    }

    public function store(Request $request)
    {
        $user_id    = Auth::user()->id;
        $product_id = (int)$request->id;

        Cart::create( compact('user_id', 'product_id') );

        return Cart::all()->where('user_id', Auth::user()->id)->count();
    }

    public function destroy($id)
    {
        if ($id == 'all') {

            $cart = Cart::all()->where('user_id', Auth::user()->id);
            foreach ($cart as $item) {
                $item->delete();
            }

            return redirect()->back();
        }

        Cart::all()
            ->where('user_id', Auth::user()->id)
            ->where('product_id', $id)
            ->first()
            ->delete();

        return redirect()->back();
    }
}
