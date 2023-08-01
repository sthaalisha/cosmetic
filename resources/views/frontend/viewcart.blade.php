@extends('frontend.layout.header')

@section('content')
@include('layouts.message')

<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Shopping cart</li>
                </ol>
              </nav>
            </div>
            <div id="basket" class="col-lg-9" style="margin-left: 7rem;">
              <div class="box">
                
                  <h1>Shopping cart</h1>
                  <p class="text-muted">You currently have ({{$itemsincart}}) item in your cart.</p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="1">Product Image</th>
                          <th>Product Name</th>
                          <th>Quantity</th>
                          <th>Unit price</th>
                          <th colspan="1">Total</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $totalprice = 0;
                        @endphp
                        @foreach ($carts as $cart )
                        <tr>
                          <td><a href="{{route('frontend.viewproduct',$cart->product->id)}}"><img src="{{asset('images/products/'.$cart->product->photopath)}}"></a></td>
                          <td><a href="{{route('frontend.viewproduct',$cart->product->id)}}">{{$cart->product->name}}</a></td>
                          <form action="{{route('cart.update',$cart->id)}}" method="POST" id="updateform">
                            @csrf
                          <td>
                          <p class="mt-4 d-flex align-items-center">
                    <span class="bg-gray-200 px-4 font-bold text-xl"><button onclick="subqty('{{ $cart->id }}')" type="button">-</button></span>
                    <input class="h-11 w-12 px-0 text-center border-0 bg-gray-100" id="qty{{ $cart->id }}" name="qty" value="{{  $cart->qty  }}" type="number" readonly >
                    <span class="bg-gray-200 px-4  font-bold text-xl"><button onclick="addqty('{{ $cart->id }}')" type="button">+</button></span>

                    <input type="hidden" id="stock{{ $cart->id }}" value="{{ $cart->product->stock }}">
                    </p>
                            <!-- <input type="number" value="{{$cart->qty}}" min="1" max="{{$cart->product->stock}}" class="form-control" onchange="updateCartItem('{{$cart->product->id}}', this.value)"> -->
                          </td>
                          <td>Rs<span id="rate{{$cart->id}}">{{$cart->product->price}}</span>/-</td>
                          
                          <td id="total{{$cart->id}}">Rs {{$cart->qty*$cart->product->price}}/-</td>
                          <td>
                          <button  onclick="document.getElementById('updateform').submit();" type="submit"
                            class="bg-blue-600 px-2 py-1 rounded shadow hover:shadow-blue-400">Update</button>
                            </form>
                            <a  onclick="return confirm('Are you sure to delete?')" href="{{route('cart.destroy',$cart->id)}}"><i class="fa fa-trash-o"></i></a>
                            
                            <!-- <a href="{{  route('order.store',$cart->id) }}" onclick="return confirm('Are you sure to order?')"  class="bg-blue-600 px-2 py-1 rounded shadow hover:shadow-blue-400">Order</a> -->
                                 
                            
                            
                            
                            

                         </td>
                        </tr>
                        @php
                          $totalprice += $cart->product->price * $cart->qty
                        @endphp
                        @endforeach
                       
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="5">Grand Total</th>
                          <th colspan="2">Rs {{$totalprice}}/-</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.table-responsive-->
                  <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="left"><a href="{{route('frontend.category','1')}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                    <div class="right">
      @if ($totalprice > 0) <!-- Checking if the cart is not empty -->
        <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
      @endif
    </div>

                  </div>
                
              </div>
              <!-- /.box-->
              <div class="row same-height-row">
                <div class="col-lg-3 col-md-6">
                  <div class="box same-height">
                    <h3>You may also like these products</h3>
                  </div>
                </div>
                
                
                
              </div>
            </div>
            <!-- /.col-lg-9-->
         
            <!-- /.col-md-3-->
          </div>
        </div>
      </div>
    </div>

    <!-- <script>
function updateCartItem(productId, newQuantity) {
    // Get the unit price and convert it to a number
    var unitPrice = parseFloat($("#unit-price-" + productId).text().replace("Rs ", "").replace("/-", ""));
    
    // Calculate the new total based on the updated quantity
    var newTotal = unitPrice * newQuantity;

    // Update the unit price and total in the table
    $("#unit-price-" + productId).text("Rs " + unitPrice.toFixed(2) + "/-");
    $("#total-" + productId).text("Rs " + newTotal.toFixed(2) + "/-");
}
</script> -->

<script>
  

  function addqty(x) {
    var qtyInput = document.getElementById('qty'+x);
    var qtyValue = parseInt(qtyInput.value);
    var stock = document.getElementById('stock'+x).value;
    if (qtyValue < stock) {
      qtyInput.value = qtyValue + 1;
      var rate = document.getElementById('rate'+x).innerHTML;
    rate = parseFloat(rate);
    document.getElementById('total'+x).innerHTML = rate*(qtyValue+1);
    var link = document.getElementById()
    }
    
  }

  function subqty(x) {
    var qtyInput = document.getElementById('qty'+x);
    var qtyValue = parseInt(qtyInput.value);

    if (qtyValue > 1) {
      qtyInput.value = qtyValue - 1;
      var rate = document.getElementById('rate'+x).innerHTML;
    rate = parseFloat(rate);
    document.getElementById('total'+x).innerHTML = rate*(qtyValue-1);
    }
    
  }
    
  </script>

@endsection



