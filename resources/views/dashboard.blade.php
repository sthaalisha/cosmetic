@extends('layouts.app')
<style>
    body {
        background-image: url('frontend/img/back22.jpg');
        background-size:cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
@section('content')
@include('layouts.message')


<h2 class="font-bold text-5xl text-blue-700">Dashboard</h2>
<hr class="h-1 bg-blue-200">

<div class="mt-4 grid grid-cols-3 gap-10">
    <div class="px-4 py-8 rounded-lg bg-white-600 text-black flex justify-between border border-black"><a href="{{ route('home') }}" class="navbar-brand home"><img
                        src="{{ asset('frontend/img/back2.png') }}" alt=" logo"
                        class="d-none d-md-inline-block">
                        <span class="sr-only"></span></a>
        <p class="font-bold text-4xl">Total Categories</p>
        <p class="font-bold text-5xl">{{$category}}</p>
    </div>


    <div class="px-4 py-8 rounded-lg bg-white-600 text-black flex justify-between border border-black ">
        <p class="font-bold text-4xl">Total Sub-Categories</p>
        <p class="font-bold text-5xl">{{$sub_category}}</p>
    </div>

    <div class="px-4 py-8 rounded-lg bg-white-600 text-green flex justify-between border border-black">
        <p class="font-bold text-4xl">Total Product</p>
        <p class="font-bold text-5xl">{{$products}}</p>
    </div>
</div>
@endsection

