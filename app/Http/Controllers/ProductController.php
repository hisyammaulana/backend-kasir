<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return response()->json([
            'message' => 'success',
            'status' => true,
            'data' => $products
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);
        $image = $request->file('image')->store('images');

        $products = Product::create([
            'name' => $request->name,
            'image' => $image,
            'price' => $request->price
        ]);

        return response()->json([
            'message' => 'success',
            'status' => true,
            'data' => $products
        ]);
    }
}
