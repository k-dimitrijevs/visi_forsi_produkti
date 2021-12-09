<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Attribute') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:pg-8">
            <form method="POST" action="{{ route('saveAttr', $product) }}">
                @csrf
                <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl bg-white">
                        <label for="key" class="text-grey-darker font-bold">Attribute Key</label>
                        <input id="key" class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none rounded" type="text"
                               name="key">
                        @error('key')
                        <p class="text-red-600">{{ $message }}</p>
                        @enderror

                        <label for="value" class="text-grey-darker font-bold">Attribute Value</label>
                        <input id="value" class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none rounded" type="text"
                               name="value">
                        @error('value')
                        <p class="text-red-600">{{ $message }}</p>
                        @enderror

                        <div class="buttons flex mt-5">
                            <button>
                                <div class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">
                                    Add Attribute
                                </div>
                            </button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
