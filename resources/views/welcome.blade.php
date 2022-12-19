@extends('layouts.app')

@section('content')
    <ul role="list" class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-3 xl:gap-x-8">

        <div
            class="flex flex-col items-center bg-white rounded-lg border shadow-md  hover:bg-gray-100">
            <div class="pt-10">
                <div id="countdown" class="grid m-auto grid-flow-col gap-3 text-center auto-cols-max">
                    <div class="flex flex-col">
                        <span class="font-mono text-5xl w-14 lg:w-20">
                            <span id="days">0</span>
                        </span>
                        days
                    </div>
                    <div class="flex flex-col">
                        <span class="font-mono text-5xl w-14 lg:w-20">
                            <span id="hours">0</span>
                        </span>
                        hours
                    </div>
                    <div class="flex flex-col">
                        <span class="font-mono text-5xl w-14 lg:w-20">
                            <span id="min">0</span>
                        </span>
                        min
                    </div>
                    <div class="flex flex-col">
                        <span class="font-mono text-5xl w-14 lg:w-20">
                            <span id="sec">0</span>
                        </span>
                        sec
                    </div>
                </div>
            </div>
            <div class="p-4 font-medium ">
                Till Black Friday
            </div>
        </div>

        @foreach ($categories as $category)
            <div
                class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100">
                <div class="m-2">
                    <img class="object-cover w-full rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                        src="img/{{ $category->name }}.webp" alt="">
                </div>
                <div class="flex flex-col justify-between p-4">
                    <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 text-gray">{{ $category->name }}</h5>
                    <h5 class="mb-2 text-sm font-semibold tracking-tight text-gray-900 text-gray">€{{ $category->low }},-
                    </h5>
                    <a href="{{ url('/category/' . $category->id) }}"
                        class="mt-2 transition inline-flex items-center py-2 px-3 text-sm w-fit  font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-[#111827] hover:text-white">
                        See prices
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="ml-2 -mr-1 w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach

        @foreach ($accessoires as $accessoire)
            <div
                class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100">
                <div class="m-2">
                    <img class="object-cover w-full  rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                        src="/images/{{ $accessoire->img }}" alt="">
                </div>
                <div class="flex flex-col justify-between p-4">
                    <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 text-gray">{{ $accessoire->name }}
                    </h5>
                    </h5>
                    <a href="{{ url($accessoire->link) }}" target="_blank"
                        class="mt-2 transition inline-flex items-center py-2 px-3 text-sm w-fit  font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-[#111827] hover:text-white">
                        Go to site
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="ml-2 -mr-1 w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </ul>

    <script>
        const countdownDiv = document.getElementById('countdown');

        const launchDate = new Date('Nov 25, 2022 00:00:00').getTime();

        const intvl = setInterval(() => {
            const now = new Date().getTime();

            const distance = launchDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const mins = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const secs = Math.floor((distance % (1000 * 60)) / 1000);

            countdown.innerHTML = `
                <div class="flex flex-col">
                    <span class="font-mono text-5xl w-14 lg:w-20">
                        <span id="days">${days}</span>
                    </span>
                    days
                </div>
                <div class="flex flex-col">
                    <span class="font-mono text-5xl w-14 lg:w-20">
                        <span id="hours">${hours}</span>
                    </span>
                    hours
                </div>
                <div class="flex flex-col">
                    <span class="font-mono text-5xl w-14 lg:w-20">
                        <span id="min">${mins}</span>
                    </span>
                    min
                </div>
                <div class="flex flex-col">
                    <span class="font-mono text-5xl w-14 lg:w-20">
                        <span id="sec">${secs}</span>
                    </span>
                    sec
                </div>
            `;

            if (distance < 0) {
                clearInterval(intvl);
                countdown.style.color = '#17a2b8';
                countdown.innerHTML = 'Launched!';
            }
        }, 1000);
    </script>
@endsection
