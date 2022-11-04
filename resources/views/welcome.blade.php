@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <ul role="list" class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($categories as $category)
                <a href="category/{{ $category->id }}">
                    <li class="relative">
                        <div
                            class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                            <img src="img/{{ $category->name }}.webp"
                                alt="" class="pointer-events-none object-cover group-hover:opacity-75">
                        </div>
                        <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">
                            {{ $category->name }}</p>
                    </li>
                </a>
            @endforeach
        </ul>
    </div>
@endsection
