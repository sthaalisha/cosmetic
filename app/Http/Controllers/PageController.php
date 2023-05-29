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
        $category = Category::all();
        
        $sub_category = Sub_Category::all();

        return view('welcome',compact('products', 'category', 'sub_category'));

    }
    public function register()
    {
        return view('frontend.register');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function frontendcategory(Category $category)
    {
        $cat = $category;
        $category = Category::all();
        
        $sub_category = Sub_Category::all();

        $products = Product::where('category_id', $cat->id)->get();
        $current_category = $cat;
        return view('frontend.category',compact('category','sub_category', 'products', 'current_category'));
    }

    public function frontendsubcategory(Sub_Category $subcategory )
        {
            $category = Category::all();

            $current_category = $subcategory -> category;
            
            $sub_category = Sub_Category::all();
            
            $products = Product::where(['']);

            return view('frontend.category',compact('category','sub_category', 'current_category'));
        }



}
