<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function update($id)
    {
        Product::onlyTrashed()->find($id)->restore();
        return redirect()->route('products.index');
    }
}
