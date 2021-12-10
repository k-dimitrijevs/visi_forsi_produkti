<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeRequest;
use App\Models\Product;
use App\Models\ProductAttributes;
use App\Repositories\ProductAttributesRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class ProductAttributesController extends Controller
{
    private ProductAttributesRepositoryInterface $attributesRepository;

    public function __construct(ProductAttributesRepositoryInterface $attributesRepository)
    {
        $this->attributesRepository = $attributesRepository;
    }

    public function index(Product $product)
    {
        return view('products.viewAttr', [
            'productAttributes' => $this->attributesRepository->getAttributes($product),
            'product' => $product,
        ]);
    }

    public function create(Product $product)
    {
        return view('products.addAttr', ['product' => $product]);
    }

    public function store(AttributeRequest $request, Product $product)
    {
        $this->attributesRepository->saveAttribute($request, $product);
        return redirect()->route('viewAttr', ['product' => $product]);
    }

    public function destroy(string $attrId): RedirectResponse
    {
        $this->attributesRepository->deleteAttribute($attrId);
        return redirect()->back();
    }
}
