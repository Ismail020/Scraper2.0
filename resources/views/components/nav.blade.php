<div>
    <nav class="bg-white shadow-sm">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <div class="h-16 flex justify-between">
                <div class="flex flex-shrink-0 items-center">
                    <a href="/">
                        <span class="font-medium text-[#333244] text-lg">Scraper2.0</span>
                    </a>
                </div>
                <div class="hidden md:flex">
                    {{-- <a href="{{ url('/add-accessoires') }}"
                    class="@if (Request::path() == 'add-accessoires') text-white bg-[#111827] @else text-[#333244] hover:bg-[#111827] @endif border-transparent transition  hover:border-dark hover:text-white rounded-md px-3 m-3 inline-flex items-center text-sm font-medium">
                    Add New Accessoires</a> --}}

                    <a href="{{ url('/stores') }}"
                        class="@if (Request::path() == 'stores') text-white bg-[#111827] @else text-[#333244] hover:bg-[#111827] @endif border-transparent transition  hover:border-dark hover:text-white rounded-md px-3 m-3 inline-flex items-center text-sm font-medium">
                        Stores</a>

                    <a href="{{ url('/add-product') }}"
                        class="@if (Request::path() == 'add-product') text-white bg-[#111827] @else text-[#333244] hover:bg-[#111827] @endif border-transparent transition  hover:border-dark hover:text-white rounded-md px-3 m-3 inline-flex items-center text-sm font-medium">
                        Add New Product</a>

                    <a href="{{ url('/test') }}"
                        class="@if (Request::path() == 'test') text-white bg-[#111827] @else text-[#333244] hover:bg-[#111827] @endif border-transparent transition  hover:border-dark hover:text-white rounded-md px-3 m-3 inline-flex items-center text-sm font-medium">
                        Test</a>

                    <a href="{{ url('/update') }}"
                        class="border-transparent transition text-[#333244] hover:border-dark hover:bg-[#111827] hover:text-white rounded-md px-3 my-3 ml-3 inline-flex items-center text-sm font-medium">Update</a>
                </div>
            </div>

        </div>
    </nav>
</div>
