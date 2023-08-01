<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\odel;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sub_Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function include()
    {
        if(!auth()->user())
        {
            return 0;
        }
        else
        {
            return Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
        }

    }

    public function home()
    {
        $itemsincart = $this -> include();
        $products = Product::all();
        $category = Category::all();
        $brand = Brand::all();

        $sub_category = Sub_Category::all();
        $categories = Category::orderBy('priority')->get();

        return view('welcome', compact('products', 'category', 'sub_category', 'categories', 'brand','itemsincart'));
    }


    public function contact()
    {
        $itemsincart = $this -> include();
        $category = Category::all();
        return view('frontend.contact', compact('category','itemsincart'));
    }

    public function about()
    {
        $itemsincart = $this -> include();
        $category = Category::all();
        return view('frontend.layout.about', compact('category','itemsincart'));
    }

    public function viewproduct(Product $product)
    {
        $itemsincart = $this -> include();
        $category = Category::all();
        $brand = Brand::all();
        $relatedproducts = Product::where('category_id',$product->category_id)->whereNot('id',$product->id)->get();
        $categories = Category::orderBy('priority')->get();
        return view('frontend.viewproduct', compact('product', 'categories', 'category', 'brand','itemsincart','relatedproducts'));
    }


    public function frontendcategory(Category $category)
    {
        $itemsincart = $this -> include();
        $cat = $category;
        $category = Category::all();
        $sub_category = Sub_Category::all();
        $products = Product::where('category_id', $cat->id)->get();
        $current_category = $cat;
        $brand = Brand::all();
        return view('frontend.category', compact('category', 'sub_category', 'products', 'brand', 'current_category','itemsincart'));
    }

    public function frontendsubcategory(Sub_Category $subcategory)
    {
        $itemsincart = $this -> include();
        $subcat = $subcategory;
        $category = Category::all();
        $brand = Brand::all();

        $current_category = $subcategory->category;

        $sub_category = Sub_Category::all();

        $products = Product::where('sub__category_id', $subcat->id)->get();

        return view('frontend.category', compact('category', 'sub_category','brand', 'current_category', 'products','itemsincart'));
    }

    public function frontendbrand(Brand $brand)
    {
        $itemsincart = $this -> include();
        $category = Category::all();
        $sub_category = Sub_Category::all();
        $products = Product::where('brand_id', $brand->id)->get();
        $current_brand = $brand;
        $brand = Brand::all();
        return view('frontend.brand', compact('category', 'sub_category', 'products', 'brand', 'current_brand','itemsincart'));
    }

    public function order()
    {
        $itemsincart = $this -> include();
        $products = Product::all();
        $category = Category::all();
        $brand = Brand::all();

        $sub_category = Sub_Category::all();
        $categories = Category::orderBy('priority')->get();
        $orders = Order::where('user_id',auth()->user()->id)->get();
        foreach($orders as $order)
        {
            $cartids = explode(',',$order->cart_id);
            $carts = [];
            foreach($cartids as $cartid)
            {
                $cart = Cart::find($cartid);
                array_push($carts,$cart);
            }
            $order->carts = $carts;
        }
        return view('frontend.vieworder', compact('products', 'category', 'sub_category', 'categories', 'brand','itemsincart','orders'));
    }

   
}
