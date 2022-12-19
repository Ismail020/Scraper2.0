@extends('layouts.app')

@section('content')
    @php
        include_once 'php/simple_html_dom.php';
        ini_set('user_agent', 'My-Application/2.5');
        
        $html = file_get_html('https://www.amac.nl/macbook-air-13-m2-8c-cpu-8c-gpu-8gb-256gb-midnight-30w-usb-c');
        $price = $html->find('span[class="price"]', 1)->plaintext;
        @dd($price);
        
    @endphp
@endsection
