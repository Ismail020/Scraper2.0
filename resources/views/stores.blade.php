@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-4 gap-4 ">

        @foreach ($stores as $store)
            <a href="/stores/{{ $store->id }}">
                <div
                    class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
                    <div class="flex-shrink-0 m-auto">
                        <img class="object-scale-down h-10 w-40" src="/images/{{ $store->img }}" alt="">
                    </div>
                </div>
            </a>
        @endforeach

    </div>
@endsection
