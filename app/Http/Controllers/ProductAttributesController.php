<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductAttributesController extends Controller
{
    public function index(Product $product)
    {
        $productAttributes = ProductAttributes::where('product_id', $product->id)
            ->get();


        return view('products.viewAttr', [
            'productAttributes' => $productAttributes,
            'productName' => $product->name,
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
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
