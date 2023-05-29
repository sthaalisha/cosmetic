<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\odel;
use App\Models\Product;
use App\Models\Sub_Category;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function home()
    {
        $products = Product::all();
        return view('welcome',compact('products'));

    }
    public function register()
    {
        return view('frontend.register');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function frontendcategory()
    {
        $category = Category::all();
        
        $sub_category = Sub_Category::all();
        
        return view('frontend.category',compact('category','sub_category'));
    }



}
