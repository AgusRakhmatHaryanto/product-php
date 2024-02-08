<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $data = Product::all();
        return view('product.index', ['products' => $data]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name'=> 'required|string|max:100',
            'qty'=> 'required|numeric',
            'price'=> 'required|decimal:0,2',
            'description'=> 'nullable|string|max:200',
        ]);

        $newProduct = Product::create($data);
        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        return view('product.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        //
        $data = $request->validate([
            'name'=> 'required|string|max:100',
            'qty'=> 'required|numeric',
            'price'=> 'required|decimal:0,2',
            'description'=> 'nullable|string|max:200',
        ]);
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    public function delete(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
