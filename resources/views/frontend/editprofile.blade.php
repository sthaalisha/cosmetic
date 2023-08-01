@extends('frontend.layout.header')

<style>
  /* CSS styles for the form */
  .form-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }

  .form-group input[type="text"],
  .form-group input[type="email"],
  .form-group input[type="phone"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }

  .form-group button {
    display: block;
    margin: 0 auto;
    text-align: center;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }

  .form-group button:hover {
    background-color: #45a049;
  }
</style>

@section('content')
<div class="form-container">
  <h2 class="text-center" style="margin-top: 10px;">Edit Your Profile</h2>
  <form action="{{route('userprofile.update')}}" method="POST">
    @csrf
    <div class="form-group" style="margin-bottom: 20px;">
      <label for="name">Name:</label>
      <input type="text" name="name" placeholder="Enter your name" value="{{ auth()->user()-> name}}">
    </div>

    <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" name="address" placeholder="Enter your address" value="{{ auth()->user()->address}}">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ auth()->user()->email}}">
    </div>

    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" name="phone" placeholder="Enter your phone number" value="{{ auth()->user()->phone}}">
    </div>

    <div class="form-group text-center">
      <button type="submit">Update</button>
    </div>
  </form>
</div>
@endsection
