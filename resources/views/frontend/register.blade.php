@extends('frontend.layout.header')


@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Register</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6">
              <div class="box">
                <h1>New account</h1>
                <p class="lead">Not our registered customer yet?</p>
                <p>With registration with us new world of beauty, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="{{route('frontend.contact')}}">contact us</a>, our customer service center is working for you 24/7.</p>
                <hr>
                <form action="{{route('frontend.register')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" placeholder="Enter your name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" placeholder="Enter your email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input name="address" type="text" placeholder="Enter your address" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input name="phone" type="text" placeholder="Enter your phone" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" placeholder="Enter your password" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input name="password_confirmation" type="password" placeholder="Confirm Password" class="form-control">
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                  </div>
                </form>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    @endsection