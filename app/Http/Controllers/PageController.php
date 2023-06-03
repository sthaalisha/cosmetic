<?php

namespace App\Http\Controllers;

use App\Models\Brand;
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
        $brand = Brand::all();

        $sub_category = Sub_Category::all();
        $categories = Category::orderBy('priority')->get();

        return view('welcome', compact('products', 'category', 'sub_category', 'categories', 'brand'));
    }


    public function contact()
    {
        $category = Category::all();
        return view('frontend.contact', compact('category'));
    }

    public function about()
    {
        $category = Category::all();
        return view('frontend.layout.about', compact('category'));
    }

    public function viewproduct(Product $product)
    {
        $category = Category::all();
        $brand = Brand::all();
        $categories = Category::orderBy('priority')->get();
        return view('frontend.viewproduct', compact('product', 'categories', 'category', 'brand'));
    }


    public function frontendcategory(Category $category)
    {
        $cat = $category;
        $category = Category::all();
        $sub_category = Sub_Category::all();
        $products = Product::where('category_id', $cat->id)->get();
        $current_category = $cat;
        $brand = Brand::all();
        return view('frontend.category', compact('category', 'sub_category', 'products', 'brand', 'current_category'));
    }

    public function frontendsubcategory(Sub_Category $subcategory)
    {
        $subcat = $subcategory;
        $category = Category::all();

        $current_category = $subcategory->category;

        $sub_category = Sub_Category::all();

        $products = Product::where('sub__category_id', $subcat->id)->get();

        return view('frontend.category', compact('category', 'sub_category', 'current_category', 'products'));
    }

    public function frontendbrand(Brand $brand)
    {
        $category = Category::all();
        $sub_category = Sub_Category::all();
        $products = Product::where('brand_id', $brand->id)->get();
        $current_brand = $brand;
        $brand = Brand::all();
        return view('frontend.brand', compact('category', 'sub_category', 'products', 'brand', 'current_brand'));
    }

    public function brand()
    {
    }
}
