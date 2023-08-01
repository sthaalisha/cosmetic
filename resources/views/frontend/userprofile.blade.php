@extends('frontend.layout.header')

<style>
    body {
      font-family: Arial, sans-serif;
    }
    
    .container {
      max-width: 400px;
      max-height: 400px;
      margin: 0 auto;
      padding: 10px;
    }
    
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="tel"] {
      width: 100%;
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
    }
    
    .button-container {
      text-align: center;
      margin-top: 20px;
    }
    
    .button-container a {
  display: inline-block;
  padding: 10px 20px;
  margin-right: 10px;
  background-color: #4CAF50;
  color: white;
  border-radius: 5px;
  text-decoration: none;
}

.button-container a:hover {
  background-color: #45a049;
}

  </style>

@section('content')

<div class="container" style="margin-bottom: 100px; padding: 150px 10px;">
    <h2 class="text-center">Your Profile</h2>
    <div class="" >
      <label for="name">Name: {{auth()->user()->name}}</label>
      <!-- <input type="text" id="name" required> -->
      <br>
      <label for="address">Address: {{auth()->user()->address}}</label>
      <!-- <input type="text" id="address" required> -->
      <br>
      <label for="email">Email: {{auth()->user()->email}}</label>
      <!-- <input type="email" id="email" required> -->
      <br>
      <label for="phone">Phone: {{auth()->user()->phone}}</label>
      <!-- <input type="tel" id="phone" required> -->
      </div>
      <div class="button-container">
  <a href="{{ route('editprofile', auth()->user()->id )}}" class="button-link">Edit Profile</a>
  <a href="{{route('user.order')}}" class="button-link">View Order</a>
</div>

    
  </div>




@endsection