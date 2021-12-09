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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
