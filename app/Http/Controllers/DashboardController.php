<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sub_Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $category=Category::count();
        $sub_category=Sub_Category::count();
        $products=Product::count();
        $user = User::count();
        $order = Order::count();
        $brand = Brand::count();
         $orderdates = Order::orderBy('order_date','desc')->limit(20)->distinct()->pluck('order_date')->toArray();
            $orderdates = array_reverse($orderdates);
            $ordercounts = [];
            foreach($orderdates as $ordr)
            {
                $count = Order::where('order_date',$ordr)->count();
                array_push($ordercounts,$count);
            }
    
            $datesOnly = array_values($orderdates);
            foreach ($datesOnly as $date) {
                $date = str_replace('"', '', $date);
            }
            
            $orderdates = $datesOnly;
    
            // $ordercounts = array_reverse($ordercounts);
        return view('dashboard',compact('category','products','user','order','orderdates','ordercounts','sub_category','brand'));
    }
}
