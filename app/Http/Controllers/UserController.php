<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
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
        $data['role'] = 'user';

        User::create($data);
        return redirect(route('frontend.userlogin'));
    }
}
