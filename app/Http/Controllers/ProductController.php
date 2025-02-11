<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:products,id',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::find($request->id);
        if ($product) {
            $product->stock = $request->stock;
            $product->price = $request->price;
            $product->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }

}
