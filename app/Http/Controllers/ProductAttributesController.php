<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeRequest;
use App\Models\Product;
use App\Models\ProductAttributes;
use Illuminate\Http\RedirectResponse;
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
            'product' => $product,
        ]);
    }

    public function create(Product $product)
    {
        return view('products.addAttr', ['product' => $product]);
    }

    public function store(AttributeRequest $request, Product $product)
    {
        $attribute = (new ProductAttributes([
            'product_id' => $product->id,
            'key' => $request->get('key'),
            'value' => $request->get('value'),
        ]));
        $attribute->save();

        return redirect()->route('viewAttr', ['product' => $product]);
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

    public function destroy(string $attrId): RedirectResponse
    {
        ProductAttributes::where('id', $attrId)->delete();

        return redirect()->back();
    }
}
