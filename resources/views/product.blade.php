@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-xl sm:px-6 lg:px-8">
        <div class="border rounded-md m-auto lg:mx-">
            <div class="bg-white p-4 rounded-md">
                <form id="switchProduct" method="POST" action="{{ route('product.patch', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="pt-3">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Product</label>
                        <select id="category_id" name="category_id"
                            class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-transparent focus:outline-none focus:border-[1px] focus:ring-black sm:text-sm">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="pt-3">
                        <label for="store_id" class="block text-sm font-medium text-gray-700">Store</label>
                        <select id="store_id" name="store_id"
                            class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-transparent focus:outline-none focus:border-[1px] focus:ring-black sm:text-sm">
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}"
                                    {{ old('store_id', $product->store_id) == $store->id ? 'selected' : '' }}>
                                    {{ $store->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <x-input type="text" name="link" placeholder="Link to product" :value="old('link', $product->link)" />

                    <div class="pt-3">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <div class="mt-1" class="pt-3">
                            <textarea rows="4" name="price" id="price"
                                class="block w-full rounded-md p-2 border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm">{{ old('price', $product->price) }}</textarea>
                        </div>
                    </div>

                    <div class="pt-3">
                        <label for="class" class="block text-sm font-medium text-gray-700">Price class</label>
                        <div class="mt-1" class="pt-3">
                            <textarea rows="4" name="class" id="class"
                                class="block w-full rounded-md p-2 border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm">{{ old('class', $product->class) }}</textarea>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-x-3">
                        <div class="pt-3  col-span-1">
                            <label for="high" class="block text-sm font-medium text-gray-700">High</label>
                            <div class="mt-1">
                                <input type="text" name="high" id="high"
                                    value="{{ old('high', $product->high) }}"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm" />
                            </div>
                        </div>
                        <div class="pt-3 col-span-1">
                            <label for="low" class="block text-sm font-medium text-gray-700">Low</label>
                            <div class="mt-1">
                                <input type="text" name="low" id="low" value="{{ old('low', $product->low) }}"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm" />
                            </div>
                        </div>
                        <div class="pt-3 col-span-1">
                            <label for="current" class="block text-sm font-medium text-gray-700">Current</label>
                            <div class="mt-1">
                                <input type="text" name="current" id="current"
                                    value="{{ old('current', $product->current) }}"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm" />
                            </div>
                        </div>
                    </div>


                    <div class="w-full text-center mt-4">
                        <x-button title="Save" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
