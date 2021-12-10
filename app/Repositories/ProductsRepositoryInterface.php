<?php

namespace App\Repositories;

use App\Http\Requests\ProductsRequest;
use App\Models\Product;

interface ProductsRepositoryInterface
{
    public function getProducts();
    public function saveProduct(ProductsRequest $request);
    public function updateProduct(ProductsRequest $request, Product $product);
    public function deleteProduct(Product $product);
}
