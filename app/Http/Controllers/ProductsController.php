<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index()
    {

        $products   = Product::all();
        $categories = Category::get(['id', 'name']);
        $trashed    = Product::onlyTrashed()->get();


        return view('myview.adminProducts', compact('products', 'categories', 'trashed'));
    }

    public function store(Request $request)
    {
        $input = $request->except('_token');


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3|unique:products',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'description' => 'required|string|min:4',
        ]);

        $error['add_product'] = $validator->errors()->messages();

        if($validator->fails()) {
            return redirect()->back()->withInput()->with($error);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $input['image'] = $file->getClientOriginalName();

            $directory = public_path() . '/images';
            $file->move($directory, $input['image']);

        }

        $product = Product::create($input);

        $product->categories()->attach($input['category_id']);

        return redirect()->route('products.index');
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3',
            'price' => 'required|numeric',
            'description' => 'required|string|min:4'
        ]);

        $error['edit'] = $validator->errors()->messages();
        if($validator->fails()) {
            return redirect()->back()->with($error);
        }

        if ($request->hasFile('image')) {


            $file = $request->file('image');
            $name = $file->getClientOriginalName();

            $directory = public_path() . '/images/products';
            $file->move($directory, $name);

            // Update name
            $product->image = $name;

        }

        $input = $request->only(['name', 'price', 'image', 'description']);
        $product->update($input);

        if($request->input('many_categories')) {

            foreach ($product->categories()->get() as $category) {
                $product->categories()->detach( $category->id );
            }

            $i = 1;
            while(isset($request['categories_' . $i])) {
                $product->categories()->attach($request['categories_' . $i]);
                $i++;
            }
        } else {
            $product->categories()->detach( $product->categories()->first()->id );
            $product->categories()->attach( $request['category_id'] );
        }

        $success['success_edit'] = 'Uspjesto prilagodzeno!';
        return redirect()->back()->with($success);
    }

    public function edit()
    {

        $products   = Product::all();
        $categories = Category::get(['id', 'name']);


        return view('myview.adminEditProduct', compact('products', 'categories'));
    }

    public function trash()
    {

        $products   = Product::all();
        $categories = Category::get(['id', 'name']);
        $trashed    = Product::onlyTrashed()->get();


        return view('myview.adminTrashProduct', compact('products', 'categories', 'trashed'));
    }


    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index');
    }
}
