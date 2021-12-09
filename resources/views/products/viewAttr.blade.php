<x-app-layout>
    <x-slot name="header">
        <div class="grid-cols-2 pb-6">
            <h2 class="float-left font-semibold text-xl text-gray-800 leading-tight">
                {{ __($productName) }}
            </h2>
            <div class="float-right btn p-1 px-4 font-semibold cursor-pointer text-gray-200 bg-blue-500 rounded">
                <a href="{{ route('products.create') }}">
                    Add Product
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="p-4 border-b border-gray-200">
                    <table class="min-w-full">
                        <thead class="bg-blue-200">
                            <tr>
                                <th scope="col" class="text-left px-6">Attribute Key</th>
                                <th scope="col" class="text-left px-6">Attribute Value</th>
                                <th scope="col" class="text-left px-6">Delete</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                        @foreach($productAttributes as $attr)
                            <tr>
                                <td class="px-6">{{ $attr->key }}</td>
                                <td class="px-6">{{ $attr->value }}</td>
                                <td>
                                    <form method="POST" action="#">
{{--                                        {{ route('deleteAttribute', $product) }}--}}
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure to delete?')">
                                            <div class="btn p-1 px-4 font-semibold cursor-pointer text-gray-200 bg-red-500 rounded">
                                                Delete Attribute
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

