<?php

namespace App\Repositories;

use App\Http\Requests\AttributeRequest;
use App\Models\Product;

interface ProductAttributesRepositoryInterface
{
    public function getAttributes(Product $product);
    public function saveAttribute(AttributeRequest $request, Product $product);
    public function deleteAttribute(string $id);
}
