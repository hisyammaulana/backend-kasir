<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use DB;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $orders = Cart::create([
            'product_id' => $request->product_id,
            'order' => $request->order,
            'price_order' => $request->price_order
        ]);

        return response()->json([
            'message' => 'success',
            'status' => true,
            'data' => $orders
        ]);
    }
}
