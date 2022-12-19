@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-between max-w-5xl  mx-auto">
        <div class="flex justify-between mb-4">
            <div class="my-auto">
                <h1 class="text-base">{{ $count }} Product(s) at {{ $store->name }}</h1>
            </div>
            <x-filter />
        </div>

        <div class="flex flex-col" id="test">
            @foreach ($products as $product)
                <div
                    class="flex flex-col justify-between items-center mb-6 bg-white rounded-2xl border shadow-md md:flex-row hover:bg-gray-100">
                    <div class="flex flex-col md:flex-row">
                        <div class="m-auto">
                            <img class="object-scale-down h-20 w-48 rounded-t-lg  md:rounded-none mt-4 md:mt-0 m-4"
                            src="/img/{{ $product->category->name }}.webp" alt="">
                        </div>
                        <div class="flex flex-col justify-between -mt-6 md:-mt-0 p-4">
                            <span class="text-base text-gray-900 text-gray">{{ $product->category->name }}</span>
                            <span class="text-base">
                                €{{ $product->current }}
                            </span>

                            @php
                                try {
                                    $json = json_decode($product->price);
                                    $second_latest = $json[count($json) - 2];
                                    $percentage = round((($product->current - $second_latest->price) / $second_latest->price) * 100, 2);
                                } catch (\Throwable $th) {
                                    $percentage = 0;
                                }
                            @endphp

                            <span
                                class="flex flex-row inline-flex items-center @if ($percentage < 0) text-green @elseif($percentage > 0) text-red-500 @else @endif">
                                {{ $percentage }}%
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-5 h-5 @if ($percentage > 0) block @else hidden @endif">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-5 h-5 @if ($percentage < 0) block @else hidden @endif">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6L9 12.75l4.286-4.286a11.948 11.948 0 014.306 6.43l.776 2.898m0 0l3.182-5.511m-3.182 5.51l-5.511-3.181" />
                                </svg>
                            </span>

                            <a href="{{ $product->link }}" target="_blank" id="test-{{ $product->id }}"
                                class="mt-1 transition inline-flex items-center py-1 px-3 text-sm w-fit  font-medium text-center text-white rounded-lg">
                                Go to site
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="ml-2 -mr-1 w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </a>
                            <style>
                                #test-{{ $product->id }} {
                                    background-color: {{ $product->store->color }};
                                }
                            </style>
                        </div>
                    </div>

                    <div class="flex flex-row gap-10 md:gap-4 mr-0 md:mr-10">
                        <div>
                            <div class="bg-[#e2ecff] w-10 h-10 rounded-lg  flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-[#648add]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18" />
                                </svg>

                            </div>
                            <div class="flex flex-col">
                                <span class="text-base text-[#648add]">
                                    €{{ $product->high }}
                                </span>
                                <span class="text-gray hidden md:block text-xs">
                                    Highest price
                                </span>
                            </div>
                        </div>

                        <div>
                            <div class="bg-[#e2effd] w-10 h-10 rounded-lg  flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-[#82b2db]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-base text-[#82b2db]">
                                    €{{ $product->low }}
                                </span>
                                <span class="text-gray hidden md:block text-xs">
                                    Lowest price
                                </span>
                            </div>
                        </div>

                        <div>
                            <div class="bg-[#e1f8fe] w-10 h-10 rounded-lg  flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-[#74dbef]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-base text-[#74dbef]">
                                    €{{ $product->average }}
                                </span>
                                <span class="text-gray hidden md:block text-xs">
                                    Average price
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
