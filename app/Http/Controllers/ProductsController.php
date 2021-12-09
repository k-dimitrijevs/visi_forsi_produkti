<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductsRequest $request): RedirectResponse
    {
        $product = (new Product([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]));
        $product->save();

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(ProductsRequest $request, Product $product): RedirectResponse
    {
        $product->update([
           'name' => $request->get('name'),
           'description' => $request->get('description')
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
