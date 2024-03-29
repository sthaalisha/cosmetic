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
                                <li aria-current="page" class="breadcrumb-item active">Login</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="col-lg-6" style="margin-left: 250px;">
                        <div class="box">
                            <h1>Login</h1>
                            <p class="lead">Already our customer?</p>
                            <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet,
                                ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris
                                placerat eleifend leo.</p>
                            <hr>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" required>
                                </div>
                                <div class="mt-3">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <span class="text-danger d-block">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log
                                        in</button>
                                </div>
                                <br>
                            </form>
                            <div class="text-center">
                                <a href="{{ route('password.request') }}">Forget Password?</a>
                                <p>if you don't have account?<a href="{{ route('frontend.register') }}"> Register here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
