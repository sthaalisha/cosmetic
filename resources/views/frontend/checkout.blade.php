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
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Checkout - Address</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box" style="margin-left: 12rem;">
                <form id="orderform" action="{{route('order.store')}}" method="POST">
                  @csrf
                  <h1 class="text-center">Checkout - Address</h1>
                  <!-- <div class="nav flex-column flex-md-row nav-pills text-center"><a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-map-marker">                  </i>Address</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-truck">                       </i>Delivery Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money">                      </i>Payment Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">                     </i>Order Review</a></div> -->
                  <div class="content py-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstname">Name</label>
                          <input name="person_name" id="person_name" type="text" placeholder="Enter Your Name" class="form-control" value="{{auth()->user()->name}}">
                        </div>
                      </div>
                     <div class="col-md-6">
                        <div class="form-group">
                          <label for="address">Address</label>
                          <input name="shipping_address" id="shipping_address" type="text" placeholder="Enter Your Address" class="form-control" value="{{auth()->user()->address}}">
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="phone">Phone Number</label>
                          <input name="phone" id="phone" type="text" placeholder="Enter Your Phone Number" class="form-control" value="{{auth()->user()->phone}}">
                        </div>
                      </div>
                      
                    </div>
                    <!-- /.row-->
                    <div class="row">
                    
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="payment_method">Payment Method </label>
                          <select id="payment_method" name="payment_method" type="text"  class="form-control">
                            <option value="COD">Cash On Delivery</option>
                            <option value="KHALTI">Khalti Payment</option>
                          </select>
                        </div>
                      </div>
                      
                    </div>
                    <!-- /.row-->
                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="{{route('cart.index')}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Cart</a>
                    <button type="button" onclick="submitdata()" class="btn btn-primary">Order Now<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <!-- /.col-lg-9-->
           
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <script>
  var name;
  var address;
  var phone;
  var paymentmethod;

  function submitdata(){
    name=document.getElementById('person_name').value;
    address=document.getElementById('shipping_address').value;
    phone=document.getElementById('phone').value;
    paymentmethod=document.getElementById('payment_method').value;


    if(paymentmethod=="KHALTI"){
      checkout.show({amount: 1000});
    }
    
    if(paymentmethod == "COD")
    {
      $('#orderform').submit();
    }

  }
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_d1fc19a52b5f414394722b3c36cde660",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);


                    $.ajax({
          url: "{{route('khalti.verify')}}", // Replace with your API endpoint URL
          method: "POST", // Change to POST, PUT, DELETE, etc. if needed
         
          data:{
            data:payload,
            _token:"{{csrf_token()}}"
          }, // Change to "xml", "html", "text", etc. based on your response type
          success: function(response) {
            // This function will be executed if the AJAX request is successful
            // 'data' will hold the response from the server
            console.log('Succesfully Paid');
            $('#orderform').submit();
          //  window.location.href="{{route('user.order')}}";
          },
          error: function(xhr, status, error) {
            // This function will be executed if there's an error with the AJAX request
            console.log("Error:", error);
          }
        });
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
           
        }
    </script>
@endsection