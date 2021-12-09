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
                <div class="p-4 border-b border-gray-200">
                    <table class="min-w-full">
                        <thead class="bg-blue-200">
                            <tr>
                                <th scope="col" class="text-left px-6">Product Name</th>
                                <th scope="col" class="text-left px-6">Description</th>
                                <th scope="col" class="text-left px-6">Attribute</th>
                                <th scope="col" class="text-left px-6">Edit</th>
                                <th scope="col" class="text-left px-6">Delete</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @foreach($products as $product)
                                <tr>
                                    <td class="px-6">{{ $product->name }}</td>
                                    <td class="px-6">{{ $product->description }}</td>
                                    <td class="px-6">
                                        <a href="{{ route('viewAttr', $product) }}">
                                            <div class="btn p-1 px-4 font-semibold cursor-pointer text-gray-200 bg-yellow-500 rounded mr-1.5">
                                                See attributes
                                            </div>
                                        </a>
                                    </td>
                                    <td class="px-6">
                                        <form method="GET" action="{{ route('products.edit', $product) }}">
                                            @csrf
                                            <button type="submit">
                                                <div class="btn p-1 px-4 font-semibold cursor-pointer text-gray-200 bg-yellow-400 rounded">
                                                    Edit Product
                                                </div>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('products.destroy', $product) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure to delete?')">
                                                <div class="btn p-1 px-4 font-semibold cursor-pointer text-gray-200 bg-red-500 rounded">
                                                    Delete Product
                                                </div>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</x-app-layout>
