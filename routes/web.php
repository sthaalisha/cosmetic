<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KhaltiController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Sub_CategoryController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sub_Category;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PageController::class,'home'])->name('home');

Route::get('get/viewproduct/{product}',[PageController::class,'viewproduct'])->name('frontend.viewproduct');

//frontendCategory
Route::get('/categories/{category}',[PageController::class,'frontendcategory'])->name('frontend.category');
Route::get('/subcategories/{subcategory}',[PageController::class,'frontendsubcategory'])->name('frontend.subcategory');

//brand
Route::get('/brands/{brand}',[PageController::class,'frontendbrand'])->name('frontend.brand');

//contact
Route::get('/contact',[PageController::class,'contact'])->name('frontend.contact');

//register
Route::get('/userregister',[UserController::class,'register'])->name('frontend.register');
Route::post('/userregister',[UserController::class,'userstore'])->name('frontend.register');

//login
Route::get('/userlogin',[UserController::class,'userlogin'])->name('frontend.userlogin');

//about
Route::get('/about',[PageController::class,'about'])->name('frontend.layout.about');

 //contact
 Route::post('/frontend/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

//userprofile   
Route::get('/frontend/userprofile/{id}',[UserController::class,'userprofile'])->name('userprofile');
Route::post('/frontend/updateprofile',[UserController::class,'userupdate'])->name('userprofile.update');
Route::get('/frontend/editprofile/{id}',[UserController::class,'editprofile'])->name('editprofile');







Route::get('/dashboard', function () {
   
    return view('dashboard');
})->middleware(['auth', 'verified','isadmin'])->name('dashboard');



Route::middleware(['auth'])->group(function(){
    //cart
    Route::get('/frontend/viewcart',[CartController::class,'index'])->name('cart.index');
    Route::post('/frontend/viewcart/store',[CartController::class,'store'])->name('cart.store');
    Route::get('/frontend/viewcart/{id}/destroy',[CartController::class,'destroy'])->name('cart.destroy');
    Route::post('/frontend/viewcart/{id}/update',[CartController::class,'update'])->name('cart.update');

    //khalti
    Route::post('khalti/verify',[KhaltiController::class,'verify'])->name('khalti.verify');


    //order
    Route::post('/order/store',[OrderController::class,'store'])->name('order.store');


    //checkout
    Route::get('/frontend/checkout',[CartController::class,'checkout'])->name('cart.checkout');


    //vieworders
    Route::get('/frontend/vieworder',[PageController::class,'order'])->name('user.order');

   
});






Route::middleware('auth','isadmin')->group(function () {

   

    

    //Category

     Route::get('/Category',[CategoryController::class,'index'])->name('Category.index');
     Route::get('/Category/create',[CategoryController::class,'create'])->name('Category.create');
     Route::post('/Category/store',[CategoryController::class,'store'])->name('Category.store');
     Route::get('/Category/{id}/edit',[CategoryController::class,'edit'])->name('Category.edit');
     Route::post('/Category/{id}/update',[CategoryController::class,'update'])->name('category.update');
     Route::post('/category/destroy',[CategoryController::class,'destroy'])->name('category.destroy');

    //Brand
    Route::get('/Brand',[BrandController::class,'index'])->name('Brand.index');
    Route::get('/Brand/create',[BrandController::class,'create'])->name('Brand.create');
    Route::post('/Brand/store',[BrandController::class,'store'])->name('Brand.store');
    Route::get('/Brand/{id}/edit',[BrandController::class,'edit'])->name('Brand.edit');
    Route::post('/Brand/{id}/update',[BrandController::class,'update'])->name('Brand.update');
    Route::post('/Brand/destroy',[BrandController::class,'destroy'])->name('Brand.destroy');

     //Category

   Route::get('/Sub-Category',[Sub_CategoryController::class,'index'])->name('Sub-Category.index');
   Route::get('/Sub-Category/create',[Sub_CategoryController::class,'create'])->name('Sub-Category.create');
   Route::post('/Sub-Category/store',[Sub_CategoryController::class,'store'])->name('Sub-Category.store');
   Route::get('/Sub-Category/{id}/edit',[Sub_CategoryController::class,'edit'])->name('Sub-Category.edit');
   Route::post('/Sub-Category/{id}/update',[Sub_CategoryController::class,'update'])->name('Sub-Category.update');
   Route::post('/Sub-Category/destroy',[Sub_CategoryController::class,'destroy'])->name('Sub-Category.destroy');


    //Product
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/{id}/update',[ProductController::class,'update'])->name('product.update');
    Route::post('/product/destroy',[ProductController::class,'destroy'])->name('product.destroy');


    //order
    Route::get('/order',[OrderController::class,'index'])->name('order.index');
    Route::get('/order/{id}/edit',[OrderController::class,'edit'])->name('order.edit');
    Route::post('/order/{id}/update',[OrderController::class,'update'])->name('order.update');
    Route::get('/order/status/{id}/{status}',[OrderController::class,'status'])->name('order.status');
    Route::get('/order/{id}/details',[OrderController::class,'details'])->name('order.detail');


    //userview
    Route::get('/userview',[UserController::class,'index'])->name('user.index');

    //add admin
    Route::get('/admin/create',[UserController::class,'createadmin'])->name('user.createadmin');
    Route::post('/admin/store',[UserController::class,'userstore'])->name('admin.store');


    //viewadminprofile
    Route::get('/adminprofile',[UserController::class,'adminprofile'])->name('adminprofile.index');
    Route::get('/adminprofile/edit/{id}',[UserController::class,'adminedit'])->name('adminprofile.edit');

    //dashboard
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



});

require __DIR__.'/auth.php';
