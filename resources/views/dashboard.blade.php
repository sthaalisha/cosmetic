@extends('layouts.app')
<style>
   
</style>
@section('content')
@include('layouts.message')


<h2 class="font-bold text-4xl text-blue-700">Dashboard</h2>
<hr class="h-1 bg-blue-200">

<div class="mt-4 grid grid-cols-3 gap-10">
    <div class="px-4 py-8 rounded-lg bg-white-600 text-black flex justify-between border border-black"><a href="{{ route('dashboard') }}" class="navbar-brand home">
      <img src="{{ asset('frontend/img/back2.png') }}" alt=" logo" class="d-none d-md-inline-block">
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

    <div class="px-4 py-8 rounded-lg bg-white-600 text-green flex justify-between border border-black">
        <p class="font-bold text-4xl">Total Users</p>
        <p class="font-bold text-5xl">{{$user}}</p>
    </div>

    <div class="px-4 py-8 rounded-lg bg-white-600 text-green flex justify-between border border-black">
        <p class="font-bold text-4xl">Total Orders</p>
        <p class="font-bold text-5xl">{{$order}}</p>
    </div>

    <div class="px-4 py-8 rounded-lg bg-white-600 text-green flex justify-between border border-black">
        <p class="font-bold text-4xl">Total Brand</p>
        <p class="font-bold text-5xl">{{$brand}}</p>
    </div>
</div>

<!DOCTYPE html>
<html>
<head>
  <title>Line Chart with Tailwind CSS</title>
  
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mx-auto px-4 py-8">
    <canvas id="myLineChart" class="w-full h-64"></canvas>
  </div>

  <script>
    // Sample data for the line chart
    const labels = {!! json_encode($orderdates) !!};
    const totalSalesData = {!! json_encode($ordercounts) !!}; // Replace with your total sales data for each day of the month

    // Configuration options
    const options = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      }
    };

    // Get the canvas element and initialize the chart
    const ctx = document.getElementById('myLineChart').getContext('2d');
    const myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [
          {
            label: 'Total Sales',
            borderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            data: totalSalesData,
            fill: true,
          }
        ]
      },
      options: options
    });
  </script>
</body>
</html>

@endsection

