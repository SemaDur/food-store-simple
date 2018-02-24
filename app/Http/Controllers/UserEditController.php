<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserEditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('myview.adminEditUser', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function viewUser()
    {
        $userid = Auth::user();
        $orders = Order::where('user_id', $userid->id)->latest()->get();

        return view('myview.userProfile', compact('userid', 'orders'));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'address' => 'required|string|max:255|min:3'
        ]);

        $error['edit'] = $validator->errors()->messages();
        if($validator->fails()) {
            return redirect()->back()->with($error);
        }

        $input = $request->only(['address']);
        $user->update($input);

        $success['success_edit'] = 'Uspjesto prilagodzeno!';
        return redirect()->back()->with($success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Product::destroy($user->id);
        return redirect()->route('myview.adminEditUser');
    }
}
