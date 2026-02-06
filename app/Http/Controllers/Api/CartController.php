<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity'   => 'nullable|integer|min:1'
        ]);

        $userId = 1;
        $qty = $request->quantity ?? 1;

        $cart = Cart::firstOrCreate([
            'user_id' => $userId
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($item) {
            $item->quantity += $qty;
            $item->save();
        } else {
            CartItem::create([
                'cart_id'   => $cart->id,
                'product_id' => $request->product_id,
                'quantity'  => $qty
            ]);
        }

        $cartCount = CartItem::where('cart_id', $cart->id)->sum('quantity');
        session()->put('cart_count', $cartCount);
    
        return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    public function cartItems()
    {
        $userId = 1;

        $cart = Cart::with('items.product')
            ->where('user_id', $userId)
            ->first();

        return response()->json([
            'status' => true,
            'data' => $cart ? $cart->items : []
        ]);
    }
}

