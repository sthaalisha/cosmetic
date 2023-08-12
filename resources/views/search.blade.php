@extends('frontend.layout.header')

@section('content')


@if(count($products) > 0)
<div class="container bg-light py-5">
                <div class="product-slider owl-carousel owl-theme">

                    @foreach ($products as $product)
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

                    @else
                    <p class="mx-10 font-extrabold">No Product Found</p>
                    @endif

                    <!-- /.product-slider-->
                </div>

            </div> <!-- /.container-->
@endsection