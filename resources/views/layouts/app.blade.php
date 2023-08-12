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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>
        <link rel="stylesheet" href="{{asset('datatable/datatables.css')}}">
        <script src="{{asset('datatable/datatables.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        
    </head>
    <body class="font-sans antialiased">
    <div class="">
            <div class="w-56 fixed top-0 bottom-0 left-0 bg-FFFF99-200 shadow-lg shadow-red-300">
                <img class="bg-white mx-2 w-56 h-40 my-2 rounded-lg py-2" src="{{asset('frontend/img/logo20.png')}}" alt="">

                <div>

                
                    <a href="/dashboard" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white"><i class="fa-solid fa-gauge"></i> Dashboard</a>

                    <a href="{{route('user.index')}}" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white"><i class="fa-solid fa-users"></i> Users</a>

                    <a href="{{route('Category.index')}}" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white"><i class="fa-solid fa-grip-vertical"></i> Category</a>
                    <a href="{{route('Sub-Category.index')}}" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white"><i class="fa-solid fa-grip"></i> Sub-Category</a>

                    <a href="{{route('product.index')}}" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white"><i class="fa-brands fa-product-hunt"></i> Product</a>
                    <a href="{{route('order.index')}}" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white"><i class="fa-solid fa-arrow-up-short-wide"></i> Order</a>
                    <a href="{{route('Brand.index')}}" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white"><i class="fa-solid fa-face-laugh-beam"></i> Brand</a>

                    <a href="{{route('adminprofile.index')}}" class="text -xl font-bold border-b-2 border-blue-500 block ml-4 px-4
                    py-1 hover:bg-blue-500 hover:text-white"><i class="fa-solid fa-user"></i> Profile</a>
            

                    <form action="{{route('logout')}}" method="POST" class="border-b-2 border-blue-500 ml-4">
                        @csrf
                        <input type="submit" value="Logout" class="text-md font-bold block ml-1 px-2 py-1 w-full text-left cursor-pointer hover:bg-blue-500 hover:text-white">
                    </form>

                </div>
                </div>

                <div class="p-4 pl-60">
                    @yield('content')

                </div>
            </div>
    </body>
</html>
