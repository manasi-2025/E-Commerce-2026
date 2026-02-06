<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();
        return view('pages.products.product-lists', compact('products'));
    }

 
    public function store_product(Request $request)
    {
        $product = Product::create($request->only('name','price'));

        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $path = $image->store('products','public');
                $product->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('product-lists');
    }

    public function edit_product(Request $request)
    {
        $product = Product::with('images')->findOrFail($request->id);
    
        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }
    
    public function update_product(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->only('name','price'));

        if ($request->hasFile('images')) {
            foreach ($product->images as $img) {
                Storage::disk('public')->delete($img->image_path);
                $img->delete();
            }

            foreach ($request->images as $image) {
                $path = $image->store('products', 'public');
                $product->images()->create([
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('product-lists');
    }

    public function delete_product($id)
    {
        $product = Product::with('images')->findOrFail($id);

        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $product->delete();

        return response()->json([
            'status' => true
        ]);
    }


    public function cart_lists(){
        $userId = 1;

        $cart = Cart::with('items.product')
            ->where('user_id', $userId)
            ->first();

        return view('pages.products.cart-lists', compact('cart'));
    }


}

