<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        View::where('tabName', 'orders')->update(['notViewed' => 0]);
        return view('orders.index',compact('orders'));
    }


    public function details($orderid)
    {
        $order = Order::find($orderid);
        $carts = Cart::whereIn('id', explode(',', $order->cart_id))->get();
        return view('orders.details',compact('order','carts'));
    }

    public function status($id,$status){
        $order=Order::find($id);
        $order->status=$status;
        $order->save();
        $user = User::find($order->user_id);
        if ($status == 'Processing') {
            //Find the carts of this order.
            $carts = $order->cart_id;
            //explode
            $carts = explode(',',$carts);
            foreach($carts as $cart)
            {
                //get product for each cart
                $cc = Cart::find($cart);
                $prd = Product::find($cc->product_id);
                $prd->stock -= $cc->qty;
                $prd->save();
            }
            $data=[
                'name'=>$user->name,
                'mailmessage'=>'Your order is in processing',
            ];
            Mail::send('email.email', $data, function($message) use($user){
                $message->to($user->email)->subject(' Order status changed');
    
            });
           
        }
        
        //send mail to user informing the status change of order
        //for processing
        
        //for completed
        if($status == 'Completed')
        {
            $data=[
                'name'=>$user->name,
                'mailmessage'=>'Your order is completed',
            ];
            Mail::send('email.email', $data, function($message) use($user){
                $message->to($user->email)->subject('Order status changed');
    
            }); 
        }


        //for Cancelled
        if($status == 'Cancelled')
        {
            $data=[
                'name'=>$user->name,
                'mailmessage'=>'Your order is Cancelled',
            ];
            Mail::send('email.cancel', $data, function($message) use($user){
                $message->to($user->email)->subject('Order status changed');
    
            }); 
        }
         

        return redirect(route('order.index'))->with('success','Status change to '.$status);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            
            
            'payment_method' => 'required',
            'shipping_address' => 'required',
            'phone' => 'required',
            'person_name' => 'required',
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['order_date'] = date('Y-m-d');
        $data['status'] = 'Pending';
        $cartids = Cart::where('user_id',$data['user_id'])->where('is_ordered',false)->get();
        $totalamount = 0;
        foreach($cartids as $cartid)
        {
            $total = $cartid->qty * $cartid->product->price;
            $totalamount += $total;
        }

        $data['amount'] = $totalamount;
        $ids = $cartids -> pluck('id')->toArray();
        $data['cart_id'] = implode(',' ,$ids);

         Order::create($data);
         View::where('tabName', 'orders')->update(['notViewed' => DB::raw('notViewed + 1')]);
         Cart::whereIn('id',$ids)->update(['is_ordered' => true]);

         //mail 
         $data = [
            'name' => auth()->user()->name,
            'mailmessage' => 'New Order has been placed',
         ];

         Mail::send('email.email',$data, function($message){
            $message->to(auth()->user()->email)
            ->subject('New Order Placed');
         });

         return redirect(route('user.order'))->with('success','Order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
