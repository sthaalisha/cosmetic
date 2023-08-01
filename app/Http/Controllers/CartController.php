<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!auth()->user())
        {
            $itemsincart = 0;
        }
        else
        {
            $itemsincart = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
        }

        $products = Product::all();
        $category = Category::all();
        $brand = Brand::all();
        $sub_category = Sub_Category::all();
        $categories = Category::orderBy('priority')->get();
        // $relatedproducts = Product::where('category_id',$products->category_id)->whereNot('id',$products->id)->get();
        $carts = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->get();
        foreach($carts as $cart)
        {
            if ($cart->product->stock<$cart->qty)
            {
                $ct = Cart::find($cart->id);
                $ct->qty = $cart->product->stock;
                $ct->save();
            }
        }

        return view('frontend.viewcart', compact('products', 'category', 'sub_category', 'categories', 'brand','carts','itemsincart'));
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
            'qty' => 'required',
            'product_id' => 'required',
        ]);

        $data['user_id'] = auth()->user()->id;

        //check if already exist
        $check = Cart::where('product_id',$data['product_id'])->where('user_id',$data['user_id'])->where('is_ordered',false)->count();
        if($check > 0)
        {
            return back()->with('success','Item already in Cart');
        }

        Cart::create($data);
        return back()->with('success','Item added to Cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        $data = $request->validate([
            'qty' => 'required',
        ]);
       
        
        $cart->update($data);
        

        return Redirect(route('cart.index'))->with('success', 'Cart item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart -> delete();
        return Redirect(route('cart.index'))->with('success','Item Deleted Sucessfully!');

    }

    public function checkout()
    {
        if(!auth()->user())
        {
            $itemsincart = 0;
        }
        else
        {
            $itemsincart = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
        }
        $products = Product::all();
        $category = Category::all();
        $brand = Brand::all();
        $sub_category = Sub_Category::all();
        $categories = Category::orderBy('priority')->get();
        $carts = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->get();
        $grandtotal = 0;
        foreach($carts as $cart)
        {
            $grandtotal += $cart->product->price * $cart->qty;
        }

        $grandtotal = $grandtotal; //to make paisa to rupee
        return view('frontend.checkout',compact('categories','grandtotal','itemsincart','products','category','brand','sub_category'));

    }
}
