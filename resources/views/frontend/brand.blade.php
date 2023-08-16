@extends('frontend.layout.header')
 <style>
   .product-image {  
     width: 100%; 
     height: 200px;  
     object-fit: cover; 
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
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <div class="card-header">
                  <h3 class="h4 card-title">Categories</h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column category-menu">
                    @foreach ($category as $categoryitem)
                    
                   <li><a href="{{route('frontend.category', $categoryitem -> id)}}" class="nav-link">{{$categoryitem->name}} <span class="badge badge-secondary"></span></a>
                      <ul class="list-unstyled">
                        @foreach ($categoryitem->sub_category as $sub_category)
                        <li><a href="{{route('frontend.subcategory', $sub_category -> id)}}" class="nav-link">{{$sub_category->name}}</a></li> 
                          
                        @endforeach

                      </ul>
                    </li>

                    @endforeach
                    
                  </ul>
                </div>
              </div>
              <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 card-title">Brands </h3>
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      @foreach ($brand as $brand)
                      <div class="checkbox">
                        <a href="/brands/{{$brand -> id}}" class="text-dark ">
                          {{$brand -> name}}
                        </a>
                      </div>
                      @endforeach
                    </div>
                  </form>
                </div>
              </div>
              


               <div class="row product ">
    @foreach ($products as $product)
    <div class="col-lg-4 col-md-6 ">
        <div class="product">
            <div class="flip-container">
                <div class="flipper">
                    <div class="front">
                        <a href="{{route('frontend.viewproduct',$product->id)}}">
                            <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="product-image img-fluid">
                        </a>
                    </div>
                    <div class="back">
                        <a href="{{route('frontend.viewproduct',$product->id)}}">
                            <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="product-image img-fluid">
                        </a>
                    </div>
                </div>
            </div>
            <a href="{{route('frontend.viewproduct',$product->id)}}" class="invisible">
                <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="product-image img-fluid">
            </a>
            <div class="text">
            
                <h3><a href="{{route('frontend.viewproduct',$product->id)}}">{{$product->name}}</a></h3>
                <div class="form-group row">
    <label for="quantity" class="col-sm-2 col-form-label">Qty:</label>
    <form action="{{route('cart.store')}}" method="POST">
      @csrf
    <div class="col-sm-10">
        <input type="number" name="qty" class="form-control" min="1" max="{{$product->stock}}" value="1">
    </div>
</div>
<p class="text-center">In Stock: {{$product->stock}}</p>
                <p class="price">
                    <del></del>Price: Rs. {{$product->price}}
                </p>
                <p class="buttons">
                    <a href="{{route('frontend.viewproduct',$product->id)}}" class="btn btn-outline-secondary">View detail</a>
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                </p>
                </form>
            </div>
            <!-- /.text-->
        </div>
    </div>
    
    <!-- /.col-lg-4 col-md-6 -->
    @endforeach
</div>
<!-- /.row.products -->



              










                
              
             
            </div>
            <!-- /.col-lg-9-->
          </div>
        </div>
      </div>

      @endsection