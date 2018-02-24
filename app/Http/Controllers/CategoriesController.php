<?php

namespace App\Http\Controllers;


use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoriesController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3|unique:categories',
        ]);
        $error['add_category'] = $validator->errors()->messages();
        if($validator->fails()) {
            return redirect()->back()->with($error);
        }


        Category::create(['name'=>$request['name']]);

        return redirect()->route('products.index');

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('products.index');
    }
}
