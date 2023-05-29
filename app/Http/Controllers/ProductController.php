<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('product.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'brand_id' =>'required',
            'category_id' =>'required',
            'name' =>'required',
            'price' => 'numeric|required',
            'stock' => 'numeric|required',
            'description' => 'required',
            'photopath' => 'required',
        ]);

        if($request->hasFile('photopath')){
            $image = $request->file('photopath');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath,$name);
            $data['photopath'] = $name;
        }

        Product::create($data);
        return redirect(route('product.index'))->with('success','Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::Find($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('product.edit',compact('product','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $data = $request->validate(([
            'brand_id' =>'required',
            'category_id' =>'required',
            'name' =>'required',
            'price' => 'numeric|required',
            'stock' => 'numeric|required',
            'description' => 'required',
            'photopath' => 'nullable'
        ]));

        if($request->hasFile('photopath')){
            $image = $request->file('photopath');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath,$name);
            File::delete(public_path('images/products'.$product->photopath));
            $data['photopath'] = $name;
        }

        $product->update($data);
        return redirect(route('product.index'))->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->dataid);
        $product->delete();
        File::delete(public_path('/images/products/'.$product->photopath));
       return redirect(route('product.index'))->with('success','Product deleted successfully');
    }
}
