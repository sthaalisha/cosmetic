@extends('layouts.app')
@section('content')
@include('layouts.message')

<h2 class="font-bold text-4xl text-blue-700">Admin Register</h2> 
    <hr class="h-1 bg-blue-200">



    <div class="fa-3x text-center">
      <i class="fa-solid fa-cog fa-spin" style="color: #09d7b5;"></i>
      <i class="fa-solid fa-cog fa-spin fa-spin-reverse" style="color: #09d7b5;"></i>
    </div>

    <form action="{{route('admin.store')}}" method="POST">
      @csrf
      <div style="margin-bottom: 20px;">
        <label for="name" style="font-size: 16px;">
          <i class="fa-solid fa-user fa-bounce fa-2xl" style="color: #09d7b5;"></i>  Name
        </label>
        <input type="text" name="name" placeholder="Enter your name" style="width: 100%; border-radius: 5px; padding: 10px; font-size: 16px;">
      </div>

      <div style="margin-bottom: 20px;">
        <label for="email" style="font-size: 16px;">
          <i class="fa-solid fa-envelope fa-bounce fa-2xl" style="color: #09d7b5;"></i>  Email
        </label>
        <input type="text" name="email" placeholder="Enter your email" style="width: 100%; border-radius: 5px; padding: 10px; font-size: 16px;">
      </div>

      <div style="margin-bottom: 20px;">
        <label for="address" style="font-size: 16px;">
          <i class="fa-solid fa-home fa-bounce fa-2xl" style="color: #09d7b5;"></i>  Address
        </label>
        <input type="text" name="address" placeholder="Enter your address" style="width: 100%; border-radius: 5px; padding: 10px; font-size: 16px;">
      </div>

      <div style="margin-bottom: 20px;">
        <label for="phone" style="font-size: 16px;">
          <i class="fa-solid fa-phone fa-bounce fa-2xl" style="color: #09d7b5;"></i>  Phone Number
        </label>
        <input type="text" name="phone" placeholder="Enter your phone number" style="width: 100%; border-radius: 5px; padding: 10px; font-size: 16px;">
      </div>

      <div style="margin-bottom: 20px;">
        <label for="password" style="font-size: 16px;">
          <i class="fa-solid fa-lock fa-bounce fa-2xl" style="color: #09d7b5;"></i>  Password
        </label>
        <input type="password" name="password" placeholder="Enter your password" style="width: 100%; padding: 10px; border-radius: 5px; font-size: 16px;">
      </div>

      <div style="margin-bottom: 20px;">
        <label for="password_confirmation" style="font-size: 16px;">
          <i class="fa-solid fa-lock fa-bounce fa-2xl" style="color: #09d7b5;"></i>  Confirm Password
        </label>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" style="width: 100%; border-radius: 5px; padding: 10px; font-size: 16px;">
      </div>


      <button type="submit" style="display: block; width: 100%; padding: 10px; border-radius: 5px; border: none; background-color: #09d7b5; color: #fff; font-size: 16px; cursor: pointer;">Register</button>
    </form>


@endsection