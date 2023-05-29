<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands =Brand::all();
    
        return view('Brand.index',compact('brands'));
    }
    public function create()
    {
        return view('Brand.create');
    }

    public function store(Request $request)
    {
       $data = $request->validate([
      'name' =>'required',
      'priority' => 'required|numeric'  
       ]);
       
       Brand::create($data);
       return redirect(route('Brand.index'))->with('success','Brand create successfully!');
    }
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('Brand.edit',compact('brand')); 
    }

    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'name' =>'required',
            'priority' => 'required|numeric'  
             ]);  

             $brand = Brand::find($id);
             $brand->update($data);
             return redirect(route('Brand.index'))->with('success','Brand updated successfully!');

    }
    
    


    public function destroy(Request $request)
    {
        $brand = Brand::find($request->dataid);
        $brand->delete();
        return redirect(route('Brand.index'))->with('success','Brand deleted successfully!');
    }

}
