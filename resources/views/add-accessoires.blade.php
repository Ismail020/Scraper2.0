@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-xl sm:px-6 lg:px-8">
        <div class="border rounded-md m-auto lg:mx-">
            <div class="bg-white p-4 rounded-md">
                <div class="w-full text-center">
                    <span class="isolate inline-flex rounded-md shadow-sm">
                        <button type="button" onclick="switchCategory()"
                            class="relative inline-flex items-center border border-gray-300 bg-white w-32 text-center py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-black">
                            <span id="categorySpan" class="m-auto text-[#252525]">
                                Category
                            </span>
                        </button>
                        <button id="myDIV" type="button" onclick="switchProduct()"
                            class="relative -ml-px inline-flex items-center border border-gray-300 bg-white w-32 text-center py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-black">
                            <span id="productSpan" class="m-auto text-gray-300">
                                Accessoires
                            </span>
                        </button>
                    </span>
                </div>
                <form id="switchCategory" method="POST" action="{{ route('store-category') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input type="text" name="name" placeholder="Category name" />
                    </div>

                    <div class="w-full text-center mt-4">
                        <x-button title="Add" />
                    </div>
                </form>

                <form id="switchProduct" class="hidden" method="POST" action="{{ route('store-accessoires') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <x-input type="text" name="name" placeholder="Name" />

                    <x-input type="text" name="link" placeholder="Link to product" />

                    <div class="pt-3">
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300"
                            for="file_input">Upload
                            file</label>
                        <input
                            class="block w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 cursor-pointer focus:border-black focus:ring-black shadow-sm"
                            id="file_input" type="file" name="img">
                    </div>

                    <div class="w-full text-center mt-4">
                        <x-button title="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function switchCategory() {
            document.getElementById("switchCategory").style.display = "block";
            document.getElementById("switchProduct").style.display = "none";
            document.getElementById("categorySpan").style.color = "rgb(25, 25, 25)";
            document.getElementById("productSpan").style.color = "rgb(209, 213, 219)";
        }

        function switchProduct() {
            document.getElementById("switchCategory").style.display = "none";
            document.getElementById("categorySpan").style.color = "rgb(209, 213, 219)";
            document.getElementById("switchProduct").style.display = "block";
            document.getElementById("productSpan").style.color = "rgb(25, 25, 25)";
        }
    </script>
@endsection
