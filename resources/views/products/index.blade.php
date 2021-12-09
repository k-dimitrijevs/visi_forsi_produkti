<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($products as $product)
                        <div class="font-sans items-center justify-center bg-white-darker w-full py-4">
                            <div class="flex">
                                <p class="font-bold pr-4">NAME:</p>
                                <p>{{ $product->name }}</p>
                            </div>
                            <div class="flex">
                                <p class="font-bold pr-4">DESCRIPTION:</p>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
