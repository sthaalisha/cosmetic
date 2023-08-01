<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sub_Category;
use Illuminate\Http\Request;

class Sub_CategoryController extends Controller
{
    public function index()
    {
        $sub_categories =Sub_Category::all();
    
        return view('Sub-Category.index',compact('sub_categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Sub-Category.create',compact('categories'));
    }


    public function show()
    {
        
    }

    public function edit($id)
    {
        $sub_category = Sub_Category::Find($id);
        $categories = Category::all();
        return view('Sub-Category.edit',compact('sub_category','categories'));
    }   

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:sub__scategories',
            'priority' => 'required|numeric',
        ]);
    
        Sub_Category::create($data);
        return redirect(route('Sub-Category.index'))->with('success', 'Sub-Category created successfully!');
    }
    
    public function update(Request $request, $id)
    {
        $sub_category = Sub_Category::find($id);
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:sub_categories,name,' . $sub_category->id,
            'priority' => 'required|numeric',
        ]);
    
        $sub_category->update($data);
        return redirect(route('Sub-Category.index'))->with('success', 'Sub-Category updated successfully!');
    }

    public function destroy(Request $request)
    {
        $sub_category = Sub_Category::find($request->dataid);
        $sub_category->delete();
        return redirect(route('Sub-Category.index'))->with('success','Sub-Category deleted successfully!');
    }
}
