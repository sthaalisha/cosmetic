@extends('frontend.layout.header')

@section('content')
    @include('layouts.message')

    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('frontend.category', $product->category->id) }}">Categories</a></li>
                                <li aria-current="page" class="breadcrumb-item active">View Product</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="col-lg-9 order-1 order-lg-2">
                        <div id="productMain" class="row text-center" style="margin-left: 250px;">
                            <div class="col-md-6">
                                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                                    <div class="item">
                                        <img src="{{ asset('images/products/' . $product->photopath) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('images/products/' . $product->photopath) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('images/products/' . $product->photopath) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box">
                                    <h1 class="text-center">{{ $product->name }}</h1>
                                    <p class="goToDescription text-center"><a href="#details" class="scroll-to">Scroll to
                                            product description</a></p>
                                    <div class="form-group row">
                                        <label for="quantity" class="col-sm-2 col-form-label"
                                            style="font-weight: bold;">Qty:</label>
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <div class="col-sm-10">
                                                <input type="number" name="qty" class="form-control" min="1"
                                                    max="{{ $product->stock }}" value="1"
                                                    style="padding: 0.375rem 0.75rem; font-size: 0.875rem; margin-top: 0.25rem;">
                                            </div>
                                    </div>
                                    <p class="text-center">In Stock: {{ $product->stock }}</p>
                                    <p class="text-center">Product for: {{ $product->category->name }}</p>

                                    <p class="price text-center">Rs. {{ $product->price }}</p>
                                    <p class="text-center buttons">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>
                                            Add to cart</button>
                                    </p>
                                    </form>
                                </div>
                                <div data-slider-id="1" class="owl-thumbs">
                                    <button class="owl-thumb-item"><img
                                            src="{{ asset('images/products/' . $product->photopath) }}" alt=""
                                            class="img-fluid"></button>
                                    <button class="owl-thumb-item"><img
                                            src="{{ asset('images/products/' . $product->photopath) }}" alt=""
                                            class="img-fluid"></button>
                                    <button class="owl-thumb-item"><img
                                            src="{{ asset('images/products/' . $product->photopath) }}" alt=""
                                            class="img-fluid"></button>
                                </div>
                            </div>
                        </div>
                        <div id="details" class="box" style="margin-left: 250px;">
                            <h4 class="text-center">Brand Name</h4>
                            <p class="text-center">{{ $product->brand->name }}</p>
                            <hr>
                            <h4 class="text-center">Product Description</h4>
                            <p class="text-center">{{ $product->description }}</p>
                            <hr>
                            <div class="social text-center">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="https://www.facebook.com/" class="external facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="https://www.instagram.com/" class="external gplus"><i class="fa fa-instagram"></i></a>
                                    
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div id="hot">
            <div class="box py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <h2 class="mb-0"><strong>Related Products</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container bg-light py-5">
                <div class="product-slider owl-carousel owl-theme">

                    @foreach ($relatedproducts as $product)
                        <div class="product item bg-white shadow-sm p-2 text-center">
                            <div class="flip-container" style="width: inherit;">
                                <div class="flipper">
                                    <div class="front h-32">
                                        <a href="{{ route('frontend.viewproduct', $product->id) }}">
                                            <img class="product-image"
                                                src="{{ asset('images/products/' . $product->photopath) }}"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h4><a href="{{ route('frontend.viewproduct', $product->id) }}">{{ $product->name }}</a>
                                </h4>

                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <label class="input-group-text bg-transparent border-0" for="quantity">Qty:</label>
                                        <input type="number" name="qty" class="form-control" min="1"
                                            max="{{ $product->stock }}" value="1">
                                    </div>
                                    <p class="text-center m-0 p-0 my-1">In Stock: {{ $product->stock }}</p>
                                    <p class="text-center m-0 p-0 mb-1">Product for: {{ $product->category->name }}</p>



                                    <p class="price m-0 p-0">
                                        <del></del>Rs. {{ $product->price }}
                                    </p>

                                    <p class="buttons">
                                        <a href="{{ route('frontend.viewproduct', $product->id) }}"
                                            class="btn btn-outline-secondary m-2">View detail</a>


                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-shopping-cart"></i>Add
                                            to cart</button>


                                    </p>
                                </form>
                            </div>
                        </div>
                    @endforeach


                    <!-- /.product-slider-->
                </div>

            </div> <!-- /.container-->
            <!-- /#hot-->
            <!-- *** HOT END ***-->
        </div>
    @endsection
