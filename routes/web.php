<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Sub_CategoryController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sub_Category;
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









Route::get('/dashboard', function () {
    $category=Category::count();
    $sub_category=Sub_Category::count();
    $products=Product::count();
    return view('dashboard',compact('category','sub_category','products'));
})->middleware(['auth', 'verified','isadmin'])->name('dashboard');








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


    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



});

require __DIR__.'/auth.php';
