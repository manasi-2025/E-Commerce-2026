<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Cart;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();
        return view('pages.users.product-lists', compact('products'));
    }
    public function display_product($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('pages.users.product-show', compact('product'));
    }
    public function users_cart_list()
    {
        $userId = 1;

        $cart = Cart::with('items.product')
            ->where('user_id', $userId)
            ->first();

        return view('pages.users.users-cart-items', compact('cart'));
    }
}
