<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories =Category::all();
    
        return view('Category.index',compact('categories'));
    }
    public function create()
    {
        return view('Category.create');
    }

    public function store(Request $request)
    {
       $data = $request->validate([
      'name' =>'required',
      'priority' => 'required|numeric'  
       ]);
       
       Category::create($data);
       return redirect(route('Category.index'))->with('success','Category create successfully!');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('Category.edit',compact('category')); 
    }

    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'name' =>'required',
            'priority' => 'required|numeric'  
             ]);  

             $category = Category::find($id);
             $category->update($data);
             return redirect(route('Category.index'))->with('success','Category updated successfully!');

    }
    
    


    public function destroy(Request $request)
    {
        $category = Category::find($request->dataid);
        $category->delete();
        return redirect(route('Category.index'))->with('success','Category deleted successfully!');
    }

}
