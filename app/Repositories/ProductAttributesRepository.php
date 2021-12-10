<?php

namespace App\Repositories;

use App\Http\Requests\AttributeRequest;
use App\Models\Product;
use App\Models\ProductAttributes;

class ProductAttributesRepository implements ProductAttributesRepositoryInterface
{
    public function getAttributes(Product $product)
    {
        return ProductAttributes::where('product_id', $product->id)->get();
    }

    public function saveAttribute(AttributeRequest $request, Product $product)
    {
        $attribute = (new ProductAttributes([
            'product_id' => $product->id,
            'key' => $request->get('key'),
            'value' => $request->get('value'),
        ]));
        $attribute->save();
    }

    public function deleteAttribute(string $id)
    {
        ProductAttributes::where('id', $id)->delete();
    }
}
