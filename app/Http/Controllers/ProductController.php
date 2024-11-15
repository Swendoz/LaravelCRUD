<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    function create()
    {
        return view('products.create');
    }

    function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'qty' => ['required', 'numeric'],
            'price' => ['required', 'decimal:0,2'],
            'description' => ['nullable']
        ]);

        $newProduct = Product::create($data);

        return redirect(route('product.index'));
    }

    function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'qty' => ['required', 'numeric'],
            'price' => ['required', 'decimal:0,2'],
            'description' => ['nullable']
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }

    function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }
}
