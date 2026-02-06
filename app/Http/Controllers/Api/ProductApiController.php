<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();

        return response()->json([
            'status' => true,
            'data' => $products
        ]);
    }
}


