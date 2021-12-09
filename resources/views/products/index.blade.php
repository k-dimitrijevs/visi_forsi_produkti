<x-app-layout>
    <x-slot name="header">
        <div class="grid-cols-2 pb-6">
            <h2 class="float-left font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Products') }}
            </h2>
            <div class="float-right btn p-1 px-4 font-semibold cursor-pointer text-gray-200 bg-blue-500 rounded">
                <a href="{{ route('products.create') }}">
                    Add Product
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-2">
                    @foreach($products as $product)
                        <div class="font-sans px-16 bg-white-darker w-full py-4 border-2 m-2">
                            <div class="flex">
                                <p class="font-bold pr-4">NAME:</p>
                                <p>{{ $product->name }}</p>
                            </div>
                            <div class="flex">
                                <p class="font-bold pr-4">DESCRIPTION:</p>
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="flex py-2">
                                <a href="{{ route('products.edit', $product) }}">
                                    <div class="btn p-1 px-4 font-semibold cursor-pointer text-gray-200 bg-yellow-500 rounded mr-1.5">
                                        Edit Product
                                    </div>
                                </a>
                                <form method="POST" action="{{ route('products.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure to delete?')">
                                        <div class="btn p-1 px-4 font-semibold cursor-pointer text-gray-200 bg-red-500 rounded">
                                            Delete Product
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
