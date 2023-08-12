@extends('frontend.layout.header')
<style>
    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .checkbox {
        padding-left: 30px;
        padding-bottom: 10px;
        font-weight: bold;
    }

    .checkbox:hover {
        /* Add your desired hover effect styles here */
        background-color: lightgray;
        /* Example: change the background color to lightgray on hover */
    }

    .nav-link:hover {
        background-color: lightgray;
    }
</style>
@section('content')
    <div id="content">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- breadcrumb-->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Category</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <!--
                                  *** MENUS AND FILTERS ***
                                  _________________________________________________________
                                  -->
                    <div class="card sidebar-menu mb-4">
                        <div class="card-header" style="background-color:D7D8D8;">
                            <h3 class="h4 card-title">Categories</h3>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column category-menu">
                                @foreach ($category as $categoryitem)
                                    <li><a href="{{ route('frontend.category', $categoryitem->id) }}" class="nav-link"
                                            style="color: black; font-weight: bold;">{{ $categoryitem->name }} <span
                                                class="badge badge-secondary"></span></a>
                                        <ul class="list-unstyled">


                                            @foreach ($categoryitem->sub_category as $sub_category)
                                                <li><a href="{{ route('frontend.subcategory', $sub_category->id) }}"
                                                        class="nav-link"
                                                        style="color: black; font-weight: bold;">{{ $sub_category->name }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="card sidebar-menu mb-4">
                        <div class="card-header" style="background-color:D7D8D8;">
                            <h3 class="h4 card-title">Brands </h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group" style="background-color:#EEEBCD; padding-top:10px;">
                                    @foreach ($brand as $brand)
                                        <div class="checkbox">
                                            <a href="/brands/{{ $brand->id }}" style="color: black;">
                                                {{ $brand->name }}
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="card sidebar-menu mb-4">
                                    <div class="card-header">
                                      <h3 class="h4 card-title">Colours <a href="#" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
                                    </div>
                                    <div class="card-body">
                                      <form>
                                        <div class="form-group">
                                          <div class="checkbox">
                                            <label>
                                              <input type="checkbox"><span class="colour white"></span> White (14)
                                            </label>
                                          </div>
                                          <div class="checkbox">
                                            <label>
                                              <input type="checkbox"><span class="colour blue"></span> Blue (10)
                                            </label>
                                          </div>
                                          <div class="checkbox">
                                            <label>
                                              <input type="checkbox"><span class="colour green"></span>  Green (20)
                                            </label>
                                          </div>
                                          <div class="checkbox">
                                            <label>
                                              <input type="checkbox"><span class="colour yellow"></span>  Yellow (13)
                                            </label>
                                          </div>
                                          <div class="checkbox">
                                            <label>
                                              <input type="checkbox"><span class="colour red"></span>  Red (10)
                                            </label>
                                          </div>
                                        </div>
                                        <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>
                                      </form>
                                    </div>
                                  </div> -->
                    <!-- *** MENUS AND FILTERS END ***-->

                </div>
                <div class="col-lg-9">
                    <div class="box">
                        <h1>{{ $current_category->name }}</h1>
                        <p>In our {{ $current_category->name }} department we offer wide selection of the best products we
                            have found and carefully selected worldwide.</p>
                    </div>
                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-md-12 col-lg-4 products-showing" style="margin-left:17rem;">Showing
                                <strong></strong> <strong></strong> products
                            </div>

                        </div>
                    </div>

                    <div class="product d-flex flex-wrap">
                        @foreach ($products as $product)
                            <div class="card mb-3 mx-2" style="width: 18rem;">
                                <div class="ratio ratio-4x3">
                                    <img src="{{ asset('images/products/' . $product->photopath) }}" class="card-img-top"
                                        alt="..." style="height: 300px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{ $product->name }}</h5>
                                    <p class="card-text mb-0">
                                        In Stock: {{ $product->stock }} units <br>
                                        Price: Rs. {{ $product->price }}
                                    </p>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <div class="input-group mb-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text border-0">Qty</span>
                                          </div>
                                          <input type="number" name="qty" class="form-control" min="1" max="{{ $product->stock }}" value="1">
                                        </div>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </form>

                                    <a href="{{ route('frontend.viewproduct', $product->id) }}"
                                        class="btn btn-outline-secondary">View detail</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.row.products -->

















                </div>
                <!-- /.col-lg-9-->
            </div>
        </div>
    </div>
@endsection
