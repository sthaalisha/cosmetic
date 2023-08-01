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
              <div class="banner"><a href="#"><img src="img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div>
            </div>
            <div class="col-lg-9">
              <div class="box info-bar">
                <div class="row">
                  <div class="col-md-12 col-lg-4 products-showing">Showing <strong></strong>  <strong></strong> products</div>
                  <div class="col-md-12 col-lg-7 products-number-sort">
                    <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                      <div class="products-number"><strong>Show</strong><a href="#" class="btn btn-sm btn-primary">12</a><a href="#" class="btn btn-outline-secondary btn-sm">24</a><a href="#" class="btn btn-outline-secondary btn-sm">All</a><span>products</span></div>
                      <div class="products-sort-by mt-2 mt-lg-0"><strong>Sort by</strong>
                        <select name="sort-by" class="form-control">
                          <option>Price</option>
                          <option>Name</option>
                          <option>Sales first</option>
                        </select>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
              <!-- <div class="row products">
                <div class="col-lg-4 col-md-6">
                @foreach ($products as $product)
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="{{route('frontend.viewproduct',$product->id)}}"><img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="{{route('frontend.viewproduct',$product->id)}}"><img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="img-fluid"></a></div>
                      </div>
                    </div>
                    <a href="{{route('frontend.viewproduct',$product->id)}}" class="invisible"><img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="img-fluid"></a>
                    <div class="text">
                      
                          
                      
                      <h3><a href="{{route('frontend.viewproduct',$product->id)}}">{{$product->name}}</a></h3>
                      <p class="price"> 
                        <del></del>Rs. {{$product->price}}
                      </p>
                      <p class="buttons"><a href="{{route('frontend.viewproduct',$product->id)}}" class="btn btn-outline-secondary">View detail</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a></p>
                    </div>
                    
                   </div>
                

                  @endforeach
                  </div>
                 
                
                
                
               </div>   -->


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



              










                
              
              <div class="pages">
                <p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a></p>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                  </ul>
                </nav>
              </div>
            </div>
            <!-- /.col-lg-9-->
          </div>
        </div>
      </div>

      @endsection