<!DOCTYPE html>
<html>

<head>
<style>


    .navbar-nav li {
        
        margin-bottom: 20px;
        margin-right: 10px; 
    }

    .navbar-nav li a {
        color: #000000; 
        font-weight: bold;
    }

    .product .item{
        width: 200px;
    }

        .nav-link {
        background-color: #EEEBCD ;
        
        text-decoration-color: blue;
        text-size-adjust: 20px;
        transition: background-color 0.3s ease; /* Adding transition for smooth effect */
    }

    .nav-link:hover {
        background-color: blanchedalmond; /* Specify the desired hover color */
    
    }
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cosmetic_Store</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/owl.carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/owl.carousel/assets/owl.theme.default.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.png') }}">
    <!-- Tweaks for older IEs-->
   


        


</head>


<body>
    <!-- navbar-->

        <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
        <div id="top">
        <div class="container">
    <div class="row">
        <div class="col-lg-6 offer mb-3 mb-lg-0">
            <a href="#" class="btn btn-success btn-sm">Offer of the day</a>
            <a href="#" class="ml-1">Get flat 35% off on orders over 5000 purchase!</a>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <ul class="menu list-inline mb-0">
                @if(auth()->user())
                    <li>
                        <a href="{{ route('userprofile',auth()->user()->id) }}"><i class="fa fa-user"></i>{{auth()->user()->name}}</a>
                        <form class="inline text-white" action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link"><i class="fa fa-sign-out"></i></button>
                        </form>
                    </li>
                @else
                    <li class="list-inline-item"><a href="{{route('frontend.userlogin')}}">Login</a></li>
                    <li class="list-inline-item"><a href="{{route('frontend.register')}}">Register</a></li>
                @endif
                
            </ul>
        </div>
    </div>
</div>

           
            <!-- *** TOP BAR END ***-->
            


        </div>
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container"><a href="{{ route('home') }}" class="navbar-brand home"><img
                        src="{{ asset('frontend/img/logo20.png') }}" alt=" logo"
                        class="d-none d-md-inline-block"><img src="{{ asset('frontend/img/logo200.png') }}"
                        alt="logo" class="d-inline-block d-md-none"><span class="sr-only">logo - go to
                        homepage</span></a>
               
                <div id="navigation" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                       <li class="nav-item" ><a href="/" class="nav-link">Home</a></li>
                      
                      <li class="nav-item"><a href="{{route('frontend.layout.about')}}" class="nav-link">About Us</a></li>
                        @foreach ($category as $categoryitem)
                            <li class="nav-item"><a href="/categories/{{$categoryitem -> id}}" class="nav-link">{{$categoryitem -> name}}</a></li>
                        @endforeach

                        

                        <li class="nav-item"><a href="{{route('frontend.contact')}}" class="nav-link">Contact Us</a></li>

                
                </ul>
                <div class="navbar-buttons d-flex justify-content-end">
                    <!-- /.nav-collapse-->
                    <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse"
                        href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span
                            class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
                    @if (auth()->user())
                    <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a
                            href="{{route('cart.index')}}" class="btn btn-primary navbar-btn"><i
                                class="fa fa-shopping-cart"></i><span>({{$itemsincart}})-item in cart</span></a></div>  
                    @endif
                    
                </div>
            </div>
            </div>
        </nav>
        <div id="search" class="collapse">
            <div class="container">
                <form action="{{route('search')}}" method="GET" role="search" class="ml-auto">
                    @csrf
                    <div class="input-group">
                        <input type="search" name="searchtext" placeholder="Search" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    @yield('content')


    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <p class="text-center text-lg-left">©Copyright</p>
                </div>
                <div class="col-lg-6">
                    <p class="text-center text-lg-right">Cosmetic store </p>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('frontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js') }}"></script>
    <script src="{{ asset('frontend/js/front.js') }}"></script>
</body>

</html>
