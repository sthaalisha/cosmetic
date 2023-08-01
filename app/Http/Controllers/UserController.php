<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sub_Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    public function index()
    {
        $users=User::all();
        return view('user.index',compact('users'));
    }


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
    public function userlogin()
    {
        $category = Category::all();
        return view('frontend.userlogin',compact('category'));
    }

    public function register()
    {
        $category = Category::all();
        return view('frontend.register',compact('category'));
    }
    
    public function userstore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'password'=>['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $data['password'] = Hash::make($data['password']);
        if(auth()->user()){
            if(auth()->user()->role=='admin'){
            $data['role']='admin';
            User::create($data);
            return redirect(route('user.index'));
            }
        }
        else{

      
        $data['role'] = 'user';

        User::create($data);
        return redirect(route('frontend.userlogin'))->with('success','Registered Successfully');
    }
}

    public function userprofile(Request $id)
    {
        $itemsincart = $this -> include();
        $products = Product::all();
        $category = Category::all();
        $brand = Brand::all();

        $sub_category = Sub_Category::all();
        $categories = Category::orderBy('priority')->get();
        $users= User::find($id);
        return view('frontend.userprofile', compact('products', 'category', 'sub_category', 'categories', 'brand','itemsincart','users'));


    }

    public function editprofile(Request $id)
    {
        $itemsincart = $this -> include();
        $products = Product::all();
        $category = Category::all();
        $brand = Brand::all();

        $sub_category = Sub_Category::all();
        $categories = Category::orderBy('priority')->get();
        $users= User::find($id);
        return view('frontend.editprofile', compact('products', 'category', 'sub_category', 'categories', 'brand','itemsincart','users'));


    }

    public function userupdate(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $data = $request->validate([

            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'email'=>'required',
        ]);
        $user->update($data);
        if(auth()->user()){
            if(auth()->user()->role=='admin'){
                $data['role']='admin';
                $user->update($data);
                return redirect(route('adminprofile.index'));
            }
            else{
                $data['role']='users';
                $user->update($data);
                return redirect()->route('userprofile',$user->id);

            }
            

        }
        
    }

    public function createadmin()
    {
        return view('user.createadmin');
    }

    public function adminprofile()
    {
        if(auth()->user()){
            if(auth()->user()->role=='admin'){
                return view('adminprofile.index');
            }
        }
    }
    

    public function adminedit()
    {
        if(auth()->user()){
            if(auth()->user()->role=='admin'){
                return view('adminprofile.edit');
            }
        }

    }
}
