@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        {{-- <div class="mb-10">
            <h2 class="text-sm font-medium text-gray-500">Available Stores</h2>
            <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
                @foreach ($products as $product)
                    @php
                        include_once 'php/simple_html_dom.php';
                        ini_set('user_agent', 'My-Application/2.5');
                        $html = file_get_html($product->link);
                        
                        try {
                            $price = $html->find($product->class, 0)->plaintext;
                        } catch (\Throwable $th) {
                            $price = 'N/A';
                        }
                    @endphp

                    <li class="col-span-1 flex rounded-md shadow-sm">
                        <div
                            class="flex-shrink-0 flex items-center justify-center w-16 {{ "$product->color" }} text-white text-sm font-medium rounded-l-md">
                            @if (isset($product->price))
                                € {{ $product->price }}
                            @else
                                {{ $price }}
                            @endif
                        </div>
                        <div
                            class="flex flex-1 items-center justify-between truncate rounded-r-md border-t border-r border-b border-gray-200 bg-white">
                            <div class="flex-1 truncate px-4 py-2 text-sm">
                                <p class="font-medium text-gray-900">{{ $product->store }}</p>
                                <a href="{{ $product->link }}" target="_blank" class="text-gray-500">Go to the store</a>
                            </div>
                            <div class="flex-shrink-0 pr-2">
                                <button type="button"
                                    class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white bg-transparent text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <span class="sr-only">Open options</span>
                                    <!-- Heroicon name: mini/ellipsis-vertical -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div> --}}

        <div id="tester" style="width:600px;height:250px;"></div>


        {{-- <canvas id="myChart" class=" lg:mx-44   ">

        </canvas> --}}
    </div>


    <script>
        jobs = {!! json_encode($products) !!};

        // var data = [{
        //     x: [1, 2, 3, 4],
        //     y: [16, 5, 11, 9],
        //     type: 'scatter'
        // }, {
        //     x: [1, 2, 3, 4],
        //     y: [16, 10, 11, 9],
        //     type: 'scatter'
        // }];

        data = [
            jobs.forEach(element => {
                {
                    x: [1, 2, 3, 4],
                    y: element.price,
                    type: 'scatter'
                }
            });
        ];

        Plotly.newPlot('tester', data);


        // const ctx = document.getElementById('myChart').getContext('2d');
        // const myChart = new Chart(ctx, {
        // type: 'line',
        // data: {
        // labels: [
        // '4-nov', '5-nov', '6-nov', '7-nov'
        // // , '8-nov', '9-nov', '10-nov', '11-nov', '12-nov', '13-nov',
        // // '14-nov', '15-nov', '16-nov', '17-nov', '18-nov', '19-nov', '20-nov', '21-nov', '22-nov', '23-nov',
        // // '24-nov', '25-nov', '26-nov', '27-nov', '28-nov', '29-nov', '30-nov'
        // ],
        // datasets: [

        // ]
        // },
        // options: {
        // elements: {
        // line: {
        // tension: 0
        // }
        // },
        // scales: {
        // yAxes: {
        // ticks: {
        // precision: 0
        // },
        // beginAtZero: false,
        // }
        // }
        // }
        // });

        // // make a function that will add the data to the chart from jobs array
        // function addData(chart, data) {
        // chart.data.datasets.push(data);
        // chart.update();
        // }

        // // loop through the jobs array and add the data to the chart
        // jobs.forEach(job => {
        // addData(myChart, {
        // label: job.store,
        // data: job.price,
        // backgroundColor: 'transparent',
        // borderColor: 'red',
        // borderWidth: 1,
        // });
        // });
    </script>
@endsection
