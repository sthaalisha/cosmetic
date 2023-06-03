<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>
        <link rel="stylesheet" href="{{asset('datatable/datatables.css')}}">
        <script src="{{asset('datatable/datatables.js')}}"></script>

        
    </head>
    <body class="font-sans antialiased">
    <div class="flex">
            <div class="w-60 h-screen bg-FFFF99-200 shadow-lg shadow-red-300">
                <img class="bg-white mx-2 w-56 h-40 my-2 rounded-lg py-2" src="frontend/img/logo20.png" alt="">

                <div>

                <h3>Hello, {{auth()->user()->role}}</h3>
                    <a href="dashboard" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white">Dashboard</a>
                    <a href="{{route('Category.index')}}" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white">Category</a>
                    <a href="{{route('Sub-Category.index')}}" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white">Sub-Category</a>

                    <a href="{{route('product.index')}}" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white">Product</a>
                    <a href="" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white">Order</a>
                    <a href="{{route('Brand.index')}}" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white">Brand</a>
                    <a href="" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white">Gallery</a>

                    <form action="{{route('logout')}}" method="POST" class="border-b-2 border-blue-500 ml-4">
                        @csrf
                        <input type="submit" value="Logout" class="text-xl font-bold block px-2 py-1 w-full text-left cursor-pointer hover:bg-blue-500 hover:text-white">
                    </form>

                </div>
                </div>

                <div class="p-4 flex-1">
                    @yield('content')

                </div>
            </div>
    </body>
</html>
