<?php

use App\Http\Middleware\AdminAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandControler;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view("/dashboard" , "dashboard")->middleware(['auth', 'auth.admin']);

Route::prefix("/brand")->middleware(['auth', 'auth.admin'])->group(function(){

    Route::get("/" ,[BrandControler::class ,"index"])->name("brand");
    Route::get("/delete/{id}" ,[BrandControler::class ,"delete"])->name("brand_delete");
    Route::get("/edit/{id}" ,[BrandControler::class ,"edit"])->name("brand_edit");
    Route::post("/edit/{id}" ,[BrandControler::class ,"update"]);
    Route::post("/" ,[BrandControler::class ,"store"]);
});


Route::resource("/category" ,CategoryController::class)->middleware(['auth', 'auth.admin']); 
Route::resource("/product" ,ProductController::class)->middleware(['auth', 'auth.admin']); 
Route::prefix("/product/image")->middleware(['auth', 'auth.admin'])->group(function(){
    Route::get("{product}/create" ,[ProductImageController::class ,"create"]);
    Route::post("{product}" ,[ProductImageController::class ,"store"]);
    Route::delete("{productImage}" ,[ProductImageController::class ,"destroy"]);
});
Route::prefix("/contact")->middleware(['auth', 'auth.admin'])->group(function(){
    Route::get("create/{id}/{type}" ,[ContactController::class ,"create"]);
    Route::post("{id}/{type}" ,[ContactController::class ,"store"]);
});
Route::resource("/supplier" ,SupplierController::class)->middleware(['auth', 'auth.admin']); 
Route::resource("/contact_types" ,ContactController::class)->middleware(['auth', 'auth.admin']); 
Route::prefix("/users")->middleware(['auth', 'auth.admin'])->group(function(){
    Route::get("/" ,[UserController::class , "index"])->name("user.index");
    Route::post("/" ,[UserController::class , "store"])->name("user.store");
    Route::get("/create" ,[UserController::class , "create"])->name("user.create");
});



Route::post("/lang" ,function (Request $request){  ;
    session()->put("locale" ,$request->l);
    
    return redirect()->back();
});

Route::view("/error" ,"error")->name("error");


Route::prefix("/user")->group(function(){
    Route::get("/category/{category}" , [CategoryController::class ,"userCats"]);
});