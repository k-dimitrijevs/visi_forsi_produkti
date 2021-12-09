<div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
    <label for="name" class="text-grey-darker font-bold">Name</label>
    <input id="name" class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" type="text"
           name="name" value="{{ old('name', $task->name ?? '') }}">
{{--    @error('product-name')--}}
{{--    <p class="text-red-600">{{ $message }}</p>--}}
{{--    @enderror--}}

    <label for="description" class="text-grey-darker font-bold">Description</label>
    <textarea id="description" class="description bg-gray-100 sec p-3 h-30 border border-gray-300 outline-none"
              name="description">{{ old('description', $task->description ?? '') }}</textarea>
{{--    @error('description')--}}
{{--    <p class="text-red-600">{{ $message }}</p>--}}
{{--    @enderror--}}

    <div class="buttons flex mt-5">
        <button>
            <div class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">
{{--                {{ $task->exists ? "Save" : "Create" }}--}}
                Add Product
            </div>
        </button>
    </div>
</div>
