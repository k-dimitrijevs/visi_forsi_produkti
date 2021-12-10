<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use App\Repositories\ProductsRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class ProductsController extends Controller
{

    private ProductsRepositoryInterface $productsRepository;

    public function __construct(ProductsRepositoryInterface $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function index()
    {
        return view('products.index', ['products' => $this->productsRepository->getProducts()]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductsRequest $request): RedirectResponse
    {
        $this->productsRepository->saveProduct($request);
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(ProductsRequest $request, Product $product): RedirectResponse
    {
        $this->productsRepository->updateProduct($request, $product);
        return redirect()->route('products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->productsRepository->deleteProduct($product);
        return redirect()->route('products.index');
    }
}
