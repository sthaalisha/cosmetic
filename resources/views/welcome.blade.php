@extends('frontend.layout.header')

<style>
    .product-image {
        width: 400px;
        height: 200px;
        /* Adjust the height as per your requirement */
        object-fit: cover;
        /* Ensure the image fills the container without distortion */

    }
</style>
@section('content')
    @include('layouts.message')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="main-slider" class="owl-carousel owl-theme">
                            <div class="item"><img src="{{ asset('frontend/img/slide11.png') }}" alt=""
                                    class="img-fluid"></div>
                            <div class="item"><img src="{{ asset('frontend/img/slide61.png') }}" alt=""
                                    class="img-fluid"></div>
                            <div class="item"><img src="{{ asset('frontend/img/slide41.png') }}" alt=""
                                    class="img-fluid"></div>

                        </div>
                        <!-- /#main-slider-->
                    </div>
                </div>
            </div>
            <!--
            *** ADVANTAGES HOMEPAGE ***
            _________________________________________________________
            -->
            <div id="advantages">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                                <div class="icon"><i class="fa fa-heart"></i></div>
                                <h3><a href="#">We love our customers</a></h3>
                                <p class="mb-0">We are known to provide best possible service ever</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                                <div class="icon"><i class="fa fa-tags"></i></div>
                                <h3><a href="#">Best prices</a></h3>
                                <p class="mb-0">You can check that the height of the price is according to the quality of
                                    product. Make a best choice by choosing us..</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                                <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                                <h3><a href="#">100% satisfaction guaranteed</a></h3>
                                <p class="mb-0">Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row-->
                </div>
                <!-- /.container-->
            </div>
            <!-- /#advantages-->
            <!-- *** ADVANTAGES END ***-->
            <!--
            *** HOT PRODUCT SLIDESHOW ***
            _________________________________________________________
            -->
            <div id="hot">
                <div class="box py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">

                                <h2 class="mb-0"><strong>Our Products</strong></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="product-slider owl-carousel owl-theme">

                        @foreach ($products as $product)
                            <div class="product item">
                                <div class="flip-container" style="width: inherit;">
                                    <div class="flipper">
                                        <div class="front h-32">
                                            <a href="{{ route('frontend.viewproduct', $product->id) }}"><img
                                                    class="product-image"
                                                    src="{{ asset('images/products/' . $product->photopath) }}"
                                                    alt=""></a>
                                        </div>

                                        <div class="back">
                                            <a href="{{ route('frontend.viewproduct', $product->id) }}"><img
                                                    class="product-image"
                                                    src="{{ asset('images/products/' . $product->photopath) }}" alt=""
                                                    class="img-fluid"></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('frontend.viewproduct', $product->id) }}" class="invisible"><img
                                        class="h-32 product-image" src="{{ asset('images/products/' . $product->photopath) }}"
                                        alt="" class="img-fluid"></a>
                                <div class="text">
                                    <h3><a href="{{ route('frontend.viewproduct', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="form-group row">
                                        <label for="quantity" class="col-sm-2 col-form-label">Qty:</label>
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <div class="col-sm-10">
                                                <input type="number" name="qty" class="form-control" min="1"
                                                    max="{{ $product->stock }}" value="1">
                                            </div>
                                    </div>
                                    <p class="text-center">In Stock: {{ $product->stock }}</p>
                                    <p class="text-center">Product for: {{ $product->category->name }}</p>



                                    <p class="price">
                                        <del></del>Rs. {{ $product->price }}
                                    </p>

                                    <p class="buttons">
                                        <a href="{{ route('frontend.viewproduct', $product->id) }}"
                                            class="btn btn-outline-secondary">View detail</a>


                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</button>


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




        </div>
        <!-- /#blog-homepage-->
    </div>
    </div>
    <!-- /.container-->
    <!-- *** BLOG HOMEPAGE END ***-->
    </div>
    </div>
    <!--
        *** FOOTER ***
        _________________________________________________________
        -->
    <div class="p-4 m-3">
        <div id="contact" class="box p-4">
            <center>
                <h1>Contact Us</h1><br>
                <p class="lead">Are you curious about something? Do you have some kind of problem with our products?</p>
                <br>
                <p>Please feel free to contact us, our customer service center is working for you 24/7.</p>
            </center>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h3><i class="fa fa-map-marker"></i>Address</h3>
                    <p>Lumbini<br>Nawalpur<br>Devchuli-10<br><br><strong>Pragatinagar</strong></p>
                </div>
                <!-- /.col-sm-4-->
                <div class="col-md-4">
                    <h3><i class="fa fa-phone"></i> Call center</h3>
                    <p class="text-muted"> Contact with the help of this number if any problem arise in our sites .</p>
                    <p><strong>9805434310</strong></p>
                </div>
                <!-- /.col-sm-4-->
                <div class="col-md-4">
                    <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                    <p class="text-muted">Please feel free to write an email to us.</p>
                    <ul>
                        <li><strong><a href="mailto:">alishastha892@gmail.com</a></strong></li>
                    </ul>
                </div>
                <!-- /.col-sm-4-->
            </div>
            <!-- /.row-->
            <hr>
            <div id="map"></div>
            <hr>
            <h2 class="text-center">Contact form</h2>
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" id="firstname"
                                class="form-control @error('firstname') is-invalid @enderror"
                                value="{{ old('firstname') }}" required>
                            @error('firstname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname"
                                class="form-control @error('lastname') is-invalid @enderror"
                                value="{{ old('lastname') }}" required>
                            @error('lastname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject"
                                class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}"
                                required>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send
                            message</button>
                    </div>
                </div>
                <!-- /.row-->
            </form>
        </div>
    </div>
    @yield('content')
@endsection
