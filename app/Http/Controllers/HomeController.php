<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'getProdCat');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(12);

        return view('myview.home', compact('categories', 'products'));
    }

    public function getProdCat($category_id) {

        $categories = Category::all();
        $products = $categories->where('id', $category_id)->first()->products()->get();

        return view( 'myview.home', compact('categories', 'products') );
    }

    public function getProduct($id) {
        $product = Product::find($id);
        return view('myview.productDetails', compact('product'));
    }
}
