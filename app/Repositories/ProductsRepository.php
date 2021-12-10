<?php

namespace App\Repositories;

use App\Http\Requests\ProductsRequest;
use App\Models\Product;

class ProductsRepository implements ProductsRepositoryInterface
{
    public function getProducts()
    {
        return Product::all();
    }

    public function saveProduct(ProductsRequest $request)
    {
        $product = (new Product([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]));
        $product->save();
    }

    public function updateProduct(ProductsRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        $product->productAttributes()->delete();
    }
}
